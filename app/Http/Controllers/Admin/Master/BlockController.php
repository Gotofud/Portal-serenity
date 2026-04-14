<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Imports\BlockImport;
use App\Models\Master\Block;
use App\Models\Master\CommunityUnit;
use App\Models\Master\NeighborhoodUnit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $block = Block::all();
        $co = CommunityUnit::all();

        return view('admin.master.block.index', compact('block', 'co'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv.xls',
        ]);

        Excel::import(new BlockImport(), $request->file('file'));

        return back()->with('success', 'Data Berhasil Diimport!');
    }

    public function exportPdf()
    {
        $block = Block::all();
        $pdf = Pdf::loadView('exports.pdf.master.block', compact('block'));
        return $pdf->download('data-block.pdf');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:250|unique:blocks,name',
            'community_id' => 'required',
            'neighborhood_id' => 'required',
            'status' => 'required',
        ]);

        $block = new Block();
        $block->name = $request->name;
        $block->community_id = $request->community_id;
        $block->neighborhood_id = $request->neighborhood_id;
        $block->status = $request->status;
        $block->save();
        return redirect()->route('dashboard.block.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
            'community_id' => 'required',
            'neighborhood_id' => 'required',
            'status' => 'required',
        ]);

        $block = Block::findOrFail($id);
        $block->name = $request->name;
        $block->community_id = $request->community_id;
        $block->neighborhood_id = $request->neighborhood_id;
        $block->status = $request->status;
        $block->save();
        return redirect()->route('dashboard.block.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $block = Block::findOrFail($id);
        $block->delete();
        return redirect()->route('dashboard.block.index')->with('success', 'Data Berhasil Dihapus');
    }
}
