<?php

namespace App\Http\Controllers\Admin\Master;

use App\Exports\CuExport;
use App\Http\Controllers\Controller;
use App\Imports\CuImport;
use App\Models\Master\CommunityUnit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $co = CommunityUnit::all();
        return view('admin.master.community-unit.index', compact('co'));
    }

    public function export()
    {
        return Excel::download(new CuExport, 'data-rt.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv.xls',
        ]);

        Excel::import(new CuImport, $request->file('file'));

        return back()->with('success', 'Data Berhasil Diimport!');
    }
    public function exportPdf()
    {
        $co = CommunityUnit::all();
        $pdf = Pdf::loadView('exports.pdf.master.co', compact('co'));
        return $pdf->download('data-rw.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no' => 'required|numeric|unique:community_units',
            'leader_name' => 'required|max:250',
            'status' => 'required',
        ]);

        $co = new CommunityUnit();
        $co->no = $request->no;
        $co->leader_name = $request->leader_name;
        $co->status = $request->status;
        $co->save();
        return redirect()->route('dashboard.community-unit.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'no' => 'required|numeric',
            'leader_name' => 'required|max:250',
            'status' => 'required',
        ]);

        $co = CommunityUnit::findOrFail($id);
        $co->no = $request->no;
        $co->leader_name = $request->leader_name;
        $co->status = $request->status;
        $co->save();
        return redirect()->route('dashboard.community-unit.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cos = CommunityUnit::findOrFail($id);
        $cos->delete();
        return redirect()->route('dashboard.community-unit.index')->with('success', 'Data Berhasil Dihapus');
    }
}
