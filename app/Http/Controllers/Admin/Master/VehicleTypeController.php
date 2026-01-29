<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\VehicleTypes;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.vehicle-type.create');
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
