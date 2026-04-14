<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Imports\ReportCategoriesImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportCategories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reportCat = \App\Models\Master\ReportCategories::all();
        return view('admin.master.report-categories.index', compact('reportCat'));
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv.xls',
        ]);

        Excel::import(new ReportCategoriesImport(), $request->file('file'));

        return back()->with('success', 'Data Berhasil Diimport!');
    }

    public function exportPdf()
    {
        $reportCat = ReportCategories::all();
        $pdf = Pdf::loadView('exports.pdf.master.report-categories', compact('reportCat'));
        return $pdf->download('data-kategori-laporan.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'types' => 'required'
        ]);

        $reportCat = new \App\Models\Master\ReportCategories();
        $reportCat->name = $request->name;
        $reportCat->types = $request->types;
        $reportCat->save();
        return redirect()->route('dashboard.report-categories.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'types' => 'required'
        ]);

        $reportCat = \App\Models\Master\ReportCategories::findOrFail($id);
        $reportCat->name = $request->name;
        $reportCat->types = $request->types;
        $reportCat->save();
        return redirect()->route('dashboard.report-categories.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reportCat = ReportCategories::findOrFail($id);
        $reportCat->delete();
        return redirect()->route('dashboard.report-categories.index')->with('success', 'Data Berhasil Dihapus');
    }
}
