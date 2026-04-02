<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Imports\StallPlaceImport;
use App\Models\Master\CommunityUnit;
use App\Models\Master\NeighborhoodUnit;
use App\Models\Master\StallPlace;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StallsPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $co = CommunityUnit::all();
        $nu = NeighborhoodUnit::all();
        $stall_place = StallPlace::all();
        return view('admin.master.stall-place.index', compact('stall_place','co','nu'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv.xls',
        ]);

        Excel::import(new StallPlaceImport(), $request->file('file'));

        return back()->with('success', 'Data Berhasil Diimport!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
            'stall_unit' => 'required',
            'rent_amount' => 'required',
            'community_id' => 'required',
            'neighborhood_id' => 'required',
            'status' => 'required',
        ]);

        $stall_place = new StallPlace();
        $stall_place->name = $request->name;
        $stall_place->stall_unit = $request->stall_unit;
        $stall_place->rent_amount = str_replace('.', '', $request->rent_amount);
        $stall_place->community_id = $request->community_id;
        $stall_place->neighborhood_id = $request->neighborhood_id;
        $stall_place->status = $request->status;
        $stall_place->save();
        return redirect()->route('dashboard.stall-place.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $co = CommunityUnit::all();
        $nu = NeighborhoodUnit::all();
        $stall_place = StallPlace::findOrFail($id);
        return view('admin.master.stall-place.edit', compact('co', 'nu', 'stall_place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
            'stall_unit' => 'required',
            'rent_amount' => 'required',
            'community_id' => 'required',
            'neighborhood_id' => 'required',
            'status' => 'required',
        ]);

        $stall_place = StallPlace::findOrFail($id);
        $stall_place->name = $request->name;
        $stall_place->stall_unit = $request->stall_unit;
        $stall_place->rent_amount = str_replace('.', '', $request->rent_amount);
        $stall_place->community_id = $request->community_id;
        $stall_place->neighborhood_id = $request->neighborhood_id;
        $stall_place->status = $request->status;
        $stall_place->save();
        return redirect()->route('dashboard.stall-place.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stall_place = StallPlace::findOrFail($id);
        $stall_place->delete();
        return redirect()->route('dashboard.stall-place.index')->with('success', 'Data Berhasil Diedit');
    }
}
