<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Imports\VehicletypeImport;
use App\Models\Master\VehicleTypes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicle_type = VehicleTypes::all();
        return view('admin.master.vehicle-type.index', compact('vehicle_type'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv.xls',
        ]);

        Excel::import(new VehicletypeImport(), $request->file('file'));

        return back()->with('success', 'Data Berhasil Diimport!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
        ]);

        $vehicle_type = new VehicleTypes();
        $vehicle_type->name = $request->name;
        $vehicle_type->save();

        return redirect()->route('dashboard.vehicle-type.index')->with('success', 'Data Berhasil Ditambahkan');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicle_type = VehicleTypes::findOrFail($id);
        return view('admin.master.vehicle-type.edit', compact('vehicle_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
        ]);

        $vehicle_type = VehicleTypes::findOrFail($id);
        $vehicle_type->name = $request->name;
        $vehicle_type->save();

        return redirect()->route('dashboard.vehicle-type.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle_type = VehicleTypes::findOrFail($id);
        $vehicle_type->delete();
        return redirect()->route('dashboard.vehicle-type.index')->with('success', 'Data Berhasil Dihapus');
    }
}
