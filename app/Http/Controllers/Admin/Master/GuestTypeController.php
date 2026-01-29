<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\GuestTypes;
use Illuminate\Http\Request;

class GuestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guest_type = GuestTypes::all();
        return view('admin.master.guest-type.index', compact('guest_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.guest-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
        ]);

        $guest_type = new GuestTypes();
        $guest_type->name = $request->name;
        $guest_type->save();

        return redirect()->route('dashboard.guest-type.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // TODO: implement show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guest_type = GuestTypes::findOrFail($id);
        return view('admin.master.guest-type.edit', compact('guest_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
        ]);

        $guest_type = GuestTypes::findOrFail($id);
        $guest_type->name = $request->name;
        $guest_type->save();

        return redirect()->route('dashboard.guest-type.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest_type = GuestTypes::findOrFail($id);
        $guest_type->delete();
        return redirect()->route('dashboard.guest-type.index')->with('success', 'Data Berhasil Dihapus');
    }
}
