<?php

namespace App\Http\Controllers\Admin\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\Bills;
use App\Models\Finance\CommunityUnitAggrements;
use App\Models\Master\CommunityUnit;
use App\Models\Master\House;
use App\Exports\BillsExport;
use App\Imports\BillsImport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Di BillController.php
        $bill = Bills::join('houses', 'bills.house_id', '=', 'houses.id')
            ->join('blocks', 'houses.block_id', '=', 'blocks.id')
            ->orderBy('blocks.name')
            ->orderByRaw("CAST(SUBSTRING_INDEX(houses.number, ' ', -1) AS UNSIGNED)")
            ->orderBy('bills.year')
            ->orderByRaw("FIELD(bills.month, 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember')")
            ->select('bills.*')
            ->get();

        $co = CommunityUnit::all();

        return view('admin.finance.bills.index', compact('bill', 'co'));
    }

    public function generateBill()
    {
        $year = date('Y');
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        // cek udah ada atau belum si bill tahun ini
        if (Bills::where('year', $year)->exists()) {
            return redirect()->back()->with('info', "Tagihan untuk tahun $year sudah tersedia.");
        }

        // penampung bulk insert
        $billData = [];
        $houses = House::where('status', 'Aktif')->get();

        // id terakhir buat invoice
        $lastId = (Bills::max('id') ?? 0) + 1;

        foreach ($houses as $house) {
            // ambil biaya dari kesepakatan
            $agreement = CommunityUnitAggrements::where('community_id', $house->community_id)->where('building_types_id', $house->building_types_id)->first();

            for ($i = 1; $i <= 12; $i++) {
                $monthName = $months[$i - 1];
                $yearMonth = Carbon::createFromDate($year, $i, 1)->format('Ym');
                $dueAt = Carbon::createFromDate($year, $i, 1)->endOfMonth()->toDateTimeString();

                // Format Kode: IWD-202601-0001
                $invoiceCode = 'IWD-' . $yearMonth . '-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);

                $billData[] = [
                    'house_id' => $house->id,
                    'code' => $invoiceCode,
                    'year' => $year,
                    'month' => $monthName,
                    'amount' => $agreement->bill_amount,
                    'status' => 'pending',
                    'due_at' => $dueAt,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $lastId++; // Increment counter agar kode invoice unik
            }
        }

        // chunking 500 data sekali biar ga timeout
        $chunks = array_chunk($billData, 500);
        foreach ($chunks as $chunk) {
            Bills::insert($chunk);
        }

        return redirect()->route('finance.bill.index')->with('success', 'Seluruh tagihan tahun ' . $year . ' berhasil digenerate.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bill = Bills::findOrFail($id);
        $house = House::with('users_houses')->first();
        return view('admin.finance.bills.detail', compact('bill','house'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'paid_at' => 'required',
            'status' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $bill = Bills::findOrFail($id);
        $bill->paid_at = $request->paid_at;
        $bill->status = $request->status;
        $filePatch = null;
        if ($request->hasFile('file')) {
            $filePatch = $request->file('file')->store('bills_prove', 'public');
        }
        $bill->file = $filePatch;
        $bill->save();
        return redirect()->route('finance.bill.index')->with('success', 'Berhasil mengubah status');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Export data tagihan ke file Excel
     */
    public function export()
    {
        return Excel::download(new BillsExport(), 'tagihan_' . date('Y-m-d') . '.xlsx');
    }

    /**
     * Tampilkan form import file
     */
    public function import()
    {
        return view('admin.finance.bills.import');
    }

    /**
     * Proses import file Excel untuk update pembayaran tagihan
     */
    public function importProcess(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xlsx,xls,csv|max:10240',
        ]);

        try {
            Excel::import(new BillsImport(), $request->file('file'));
            return redirect()->route('finance.bill.index')->with('success', 'Berhasil mengimport data pembayaran tagihan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengimport file: ' . $e->getMessage());
        }
    }
}
