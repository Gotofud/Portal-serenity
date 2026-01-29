<?php

namespace App\Http\Controllers\Admin\Resindet;

use App\Http\Controllers\Controller;
use App\Models\Master\Role;
use App\Models\Resident\User;
use Hash;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operator = User::whereHas('roles', function ($role) {
            $role->whereIn('name', ['Admin', 'Security', 'Super Admin']);
        })->get();

        $opCount = $operator->count();
        $opActive = $operator->where('status', 'Aktif')->count();
        $opNonactive = $operator->where('status', 'Nonaktif')->count();
        return view('admin.resident.operator.index', compact('operator', 'opActive', 'opCount', 'opNonactive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.resident.operator.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'status' => 'required',
        ]);

        $operator = new User();
        $operator->name = $request->name;
        $operator->email = $request->email;
        $operator->password = bcrypt($request->password);
        $operator->status = $request->status;
        $operator->role_id = Role::where('name', 'Admin')->value('id');
        $operator->save();

        return redirect()
            ->route('resident.operator.index')
            ->with('success', 'Data Berhasil Ditambahkan');
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
        $operator = User::findOrFail($id);
        return view('admin.resident.operator.edit', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'status' => 'required',
        ]);

        $operator = User::findOrFail($id);
        $operator->name = $request->name;
        $operator->email = $request->email;
        $operator->password = bcrypt($request->password);
        $operator->status = $request->status;
        $operator->role_id = Role::where('name', 'Admin')->value('id');
        $operator->save();

        return redirect()
            ->route('resident.operator.index')
            ->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $operator = User::findOrFail($id);
        $operator->delete();
         return redirect()
            ->route('resident.operator.index')
            ->with('success', 'Data Berhasil Dihapis');
    }
}
