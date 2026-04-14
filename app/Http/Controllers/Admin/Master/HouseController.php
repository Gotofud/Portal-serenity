<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Imports\HouseImport;
use App\Models\Master\CommunityUnit;
use App\Models\Master\House;
use App\Models\Master\BuildingType;
use App\Models\User\UsersHouse;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $house = House::with(['users_houses.users.user_profile'])->get();
        $co = CommunityUnit::all();
        $bt = BuildingType::all();
        return view('admin.master.house.index', compact('house', 'co', 'bt'));

    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv.xls',
        ]);

        Excel::import(new HouseImport(), $request->file('file'));

        return back()->with('success', 'Data Berhasil Diimport!');
    }
    public function exportPdf()
    {
        $house = House::all();
        $pdf = Pdf::loadView('exports.pdf.master.house', compact('house'));
        return $pdf->download('data-rumah.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'number' => 'required|unique:houses,number',
            'building_types_id' => 'required',
            'neighborhood_id' => 'required',
            'community_id' => 'required',
            'block_id' => 'required',
            'status' => 'required',
        ]);

        $house = new House();
        $house->building_types_id = $request->building_types_id;
        $house->community_id = $request->community_id;
        $house->neighborhood_id = $request->neighborhood_id;
        $house->block_id = $request->block_id;
        $house->number = $request->number;
        $house->status = $request->status;
        $house->save();

        return redirect()->route('dashboard.house.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'number' => 'required|unique:houses,number',
            'building_types_id' => 'required',
            'neighborhood_id' => 'required',
            'community_id' => 'required',
            'block_id' => 'required',
            'status' => 'required',
        ]);

        $house = House::findOrFail($id);
        $house->building_types_id = $request->building_types_id;
        $house->community_id = $request->community_id;
        $house->neighborhood_id = $request->neighborhood_id;
        $house->block_id = $request->block_id;
        $house->number = $request->number;
        $house->status = $request->status;
        $house->save();

        return redirect()->route('dashboard.house.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $house = House::findOrFail($id);
        $house->delete();
        return redirect()->route('dashboard.house.index')->with('success', 'Data Berhasil Dihapus');
    }
}
