<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\CommunityUnit;
use App\Models\Master\NeighborhoodUnit;
use Illuminate\Http\Request;

class NUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nu = NeighborhoodUnit::all();
        return view('admin.master.neighborhood-unit.index', compact('nu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $co = CommunityUnit::all();
        return view('admin.master.neighborhood-unit.create', compact('co'));
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
