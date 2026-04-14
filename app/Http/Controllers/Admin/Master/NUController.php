<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Imports\NuImport;
use App\Models\Master\CommunityUnit;
use App\Models\Master\NeighborhoodUnit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nu = NeighborhoodUnit::all();
        $co = CommunityUnit::all();
        return view('admin.master.neighborhood-unit.index', compact('nu', 'co'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv.xls',
        ]);

        Excel::import(new NuImport, $request->file('file'));

        return back()->with('success', 'Data Berhasil Diimport!');
    }

    public function exportPdf()
    {
        $nu = NeighborhoodUnit::all();
        $pdf = Pdf::loadView('exports.pdf.master.nu', compact('nu'));
        return $pdf->download('data-rt.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no' => 'required|numeric',
            'community_id' => 'required',
            'leader_name' => 'required|max:250',
            'status' => 'required',
        ]);

        $nu = new NeighborhoodUnit();
        $nu->no = $request->no;
        $nu->community_id = $request->community_id;
        $nu->leader_name = $request->leader_name;
        $nu->status = $request->status;
        $nu->save();
        return redirect()->route('dashboard.neighborhood-unit.index')->with('success', 'Data Berhasil Ditambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $co = CommunityUnit::all();
        $nu = NeighborhoodUnit::findOrFail($id);
        return view('admin.master.neighborhood-unit.edit', compact('nu', 'co'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'no' => 'required|numeric',
            'community_id' => 'required',
            'leader_name' => 'required|max:250',
            'status' => 'required',
        ]);

        $nu = NeighborhoodUnit::findOrFail($id);
        $nu->no = $request->no;
        $nu->community_id = $request->community_id;
        $nu->leader_name = $request->leader_name;
        $nu->status = $request->status;
        $nu->save();
        return redirect()->route('dashboard.neighborhood-unit.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nu = NeighborhoodUnit::findOrFail($id);
        $nu->delete();
        return redirect()->route('dashboard.neighborhood-unit.index')->with('success', 'Data Berhasil Dihapus');
    }
}
