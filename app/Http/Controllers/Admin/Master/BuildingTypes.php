<?php

namespace App\Http\Controllers\Admin\Master;
use App\Http\Controllers\Controller;
use App\Imports\BuildingTypeImport;
use App\Models\Master\BuildingType;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BuildingTypes extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildingTypes = BuildingType::all();
        return view('admin.master.building-types.index', compact('buildingTypes'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv.xls',
        ]);

        Excel::import(new BuildingTypeImport(), $request->file('file'));

        return back()->with('success', 'Data Berhasil Diimport!');
    }

    public function exportPdf()
    {
        $buildingTypes = BuildingType::all();
        $pdf = Pdf::loadView('exports.pdf.master.building-type', compact('buildingTypes'));
        return $pdf->download('data-jenis-bangunan.pdf');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
        ]);

        $buildingTypes = new BuildingType();
        $buildingTypes->name = $request->name;
        $lastRecord = BuildingType::latest('id')->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $years = date('Y');
        $codes = 'TPB-' . $years . '-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
        $buildingTypes->code = $codes;
        $buildingTypes->save();
        return redirect()->route('dashboard.building-type.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
        ]);

        $buildingTypes = BuildingType::findOrFail($id);
        $buildingTypes->name = $request->name;
        $lastRecord = BuildingType::latest('id')->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $years = date('Y');
        $codes = 'TPB-' . $years . '-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
        $buildingTypes->code = $codes;
        $buildingTypes->save();
        return redirect()->route('dashboard.building-type.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buildingTypes = BuildingType::findOrFail($id);
        $buildingTypes->delete();
        return redirect()->route('dashboard.building-type.index')->with('success', 'Data Berhasil Dihapus');
    }
}
