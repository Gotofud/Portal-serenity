<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Imports\GuestypeImport;
use App\Models\Master\GuestTypes;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guest_type = GuestTypes::all();
        return view('admin.master.guest-type.index', compact('guest_type'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv.xls',
        ]);

        Excel::import(new GuestypeImport(), $request->file('file'));

        return back()->with('success', 'Data Berhasil Diimport!');
    }

      public function exportPdf()
    {
        $guestTypes = GuestTypes::all();
        $pdf = Pdf::loadView('exports.pdf.master.guest-type', compact('guestTypes'));
        return $pdf->download('data-jenis-tamu.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
        ]);

        $guest_type = new GuestTypes();
        $guest_type->name = $request->name;
        $guest_type->save();

        return redirect()->route('dashboard.guest-type.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
        ]);

        $guest_type = GuestTypes::findOrFail($id);
        $guest_type->name = $request->name;
        $guest_type->save();

        return redirect()->route('dashboard.guest-type.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest_type = GuestTypes::findOrFail($id);
        $guest_type->delete();
        return redirect()->route('dashboard.guest-type.index')->with('success', 'Data Berhasil Dihapus');
    }
}
