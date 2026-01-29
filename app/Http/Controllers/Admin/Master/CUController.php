<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\CommunityUnit;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.community-unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'no' => 'required|numeric',
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
        $co = CommunityUnit::findOrFail($id);
        return view('admin.master.community-unit.edit',compact('co'));
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
