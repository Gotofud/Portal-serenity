<?php

namespace App\Http\Controllers\Admin\Master;
use App\Http\Controllers\Controller;
use App\Models\Master\BuildingType;
use Illuminate\Http\Request;

class BuildingTypes extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildingTypes = BuildingType::all();
        return view('admin.master.building-types.index', compact('buildingTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.building-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
        ]);

        $buildingTypes = new BuildingType();
        $buildingTypes->name = $request->name;
        $lastRecord = BuildingType::latest('id')->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $years = date('Y');
        $codes = 'TPB-' . $years . '-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
        $buildingTypes->code = $codes;
        $buildingTypes->save();
        return redirect()->route('dashboard.building-type.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $buildingTypes = BuildingType::findOrFail($id);
        return view('admin.master.building-types.edit', compact('buildingTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
        ]);

        $buildingTypes = BuildingType::findOrFail($id);
        $buildingTypes->name = $request->name;
        $lastRecord = BuildingType::latest('id')->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $years = date('Y');
        $codes = 'TPB-' . $years . '-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
        $buildingTypes->code = $codes;
        $buildingTypes->save();
        return redirect()->route('dashboard.building-type.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buildingTypes = BuildingType::findOrFail($id);
        $buildingTypes->delete();
        return redirect()->route('dashboard.building-type.index')->with('success', 'Data Berhasil Dihapus');
    }
}
