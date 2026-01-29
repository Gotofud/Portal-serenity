<?php

namespace App\Http\Controllers\Admin\Master;


use App\Http\Controllers\Controller;
use App\Models\Master\Role;
use App\Models\Resident\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::all();

        $roleDash = Role::withCount('users')
            ->with(['users' => fn($q) => $q->take(3)])
            ->take(3)
            ->get();

        return view('admin.master.role.index', compact('role', 'roleDash'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
            'status' => 'required',
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->status = $request->status;
        $role->save();

        return redirect()->route('dashboard.role.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $role = Role::findOrFail($id);
        return view('admin.master.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
            'status' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->status = $request->status;
        $role->save();

        return redirect()->route('dashboard.role.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('dashboard.role.index')->with('success', 'Data Berhasil Dihapus');
    }
}
