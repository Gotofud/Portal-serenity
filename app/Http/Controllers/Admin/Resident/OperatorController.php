<?php

namespace App\Http\Controllers\Admin\Resident;

use App\Http\Controllers\Controller;
use App\Imports\OperatorImport;
use App\Models\Master\CommunityUnit;
use App\Models\Master\Role;
use App\Models\Resident\NeighborhoodOperator;
use App\Models\Resident\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        $co = CommunityUnit::all();
        return view('admin.resident.operator.index', compact('operator', 'opActive', 'opCount', 'opNonactive','co'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv.xls',
        ]);

        Excel::import(new OperatorImport(), $request->file('file'));

        return back()->with('success', 'Data Berhasil Diimport!');
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
            'community_id' => 'required',
            'neighborhood_id' => 'required',
        ]);

        try {
            $operator = new User();
            $operator->name = $request->name;
            $operator->email = $request->email;
            $operator->password = bcrypt($request->password);
            $operator->status = $request->status;
            $operator->role_id = Role::where('name', 'Admin')->value('id');
            $operator->save();
            
            $neighborhood_Operator = new NeighborhoodOperator();
            $neighborhood_Operator->user_id = $operator->id;
            $neighborhood_Operator->community_id = $request->community_id;
            $neighborhood_Operator->neighborhood_id = $request->neighborhood_id;
            $neighborhood_Operator->save();

            return redirect()
                ->route('resident.operator.index')
                ->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Error: ' . $e->getMessage())
                ->withInput();
        }
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
        $co = CommunityUnit::all();
        return view('admin.resident.operator.edit', compact('operator', 'co'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'status' => 'required',
            'community_id' => 'required',
            'neighborhood_id' => 'required',
        ]);

        try {
            $operator = User::findOrFail($id);
            $operator->name = $request->name;
            $operator->email = $request->email;
            $operator->password = bcrypt($request->password);
            $operator->status = $request->status;
            $operator->role_id = Role::where('name', 'Admin')->value('id');
            $operator->save();

            // Update atau buat neighborhood operator jika belum ada
            NeighborhoodOperator::updateOrCreate(
                ['user_id' => $id],
                [
                    'community_id' => $request->community_id,
                    'neighborhood_id' => $request->neighborhood_id,
                ]
            );

            return redirect()
                ->route('resident.operator.index')
                ->with('success', 'Data Berhasil Diedit');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Hapus neighborhood operator terlebih dahulu (foreign key)
            NeighborhoodOperator::where('user_id', $id)->delete();
            
            // Kemudian hapus user
            $operator = User::findOrFail($id);
            $operator->delete();
            
            return redirect()
                ->route('resident.operator.index')
                ->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
