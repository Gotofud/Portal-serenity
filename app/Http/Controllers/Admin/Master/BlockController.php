<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Block;
use App\Models\Master\CommunityUnit;
use App\Models\Master\NeighborhoodUnit;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $block = Block::all();
        return view('admin.master.block.index', compact('block'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $co = CommunityUnit::all();
        $nu = NeighborhoodUnit::all();
        return view('admin.master.block.create', compact('co', 'nu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:250|unique',
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $co = CommunityUnit::all();
        $nu = NeighborhoodUnit::all();
        $block = Block::findOrFail($id);
        return view('admin.master.block.edit', compact('co', 'nu', 'block'));
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
