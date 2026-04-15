<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Imports\StallPlaceImport;
use App\Models\Master\CommunityUnit;
use App\Models\Master\NeighborhoodUnit;
use App\Models\Master\StallPlace;
use App\Models\Resident\NeighborhoodOperator;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StallsPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->roles->name == 'Admin') {
            $nu = NeighborhoodOperator::where('user_id', $user->id)->first();
            $stall_place = StallPlace::where('community_id', $nu->community_id)->get();
        } else {
            $stall_place = StallPlace::all();
        }
        $co = CommunityUnit::all();
        $nu = NeighborhoodUnit::all();
        return view('admin.master.stall-place.index', compact('stall_place', 'co', 'nu'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv.xls',
        ]);

        Excel::import(new StallPlaceImport(), $request->file('file'));

        return back()->with('success', 'Data Berhasil Diimport!');
    }

    public function exportPdf()
    {
        $user = Auth::user();
        if ($user->roles->name == 'Admin') {
            $nu = NeighborhoodOperator::where('user_id', $user->id)->first();
            $stall_place = StallPlace::where('community_id', $nu->community_id)->get();
        } else {
            $stall_place = StallPlace::all();
        }
        $pdf = Pdf::loadView('exports.pdf.master.stall-place', compact('stallPlace'));
        return $pdf->download('data-tempat-kios.pdf');
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
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $stall_place = new StallPlace();
        $stall_place->name = $request->name;
        $stall_place->stall_unit = $request->stall_unit;
        $stall_place->rent_amount = str_replace('.', '', $request->rent_amount);
        $stall_place->community_id = $request->community_id;
        $stall_place->neighborhood_id = $request->neighborhood_id;
        $stall_place->status = $request->status;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('stall', 'public');
            $stall_place->image = $path;
        }
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
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $stall_place = StallPlace::findOrFail($id);
        $stall_place->name = $request->name;
        $stall_place->stall_unit = $request->stall_unit;
        $stall_place->rent_amount = str_replace('.', '', $request->rent_amount);
        $stall_place->community_id = $request->community_id;
        $stall_place->neighborhood_id = $request->neighborhood_id;
        $stall_place->status = $request->status;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('stall', 'public');
            $stall_place->image = $path;
        }
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
