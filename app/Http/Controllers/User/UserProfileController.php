<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Resident\User;
use App\Models\User\UserProfile;
use App\Models\User\UsersHouse;
use App\Models\Vehicles;
use Auth;
use DB;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $user = UserProfile::where('user_id', $userId)->first();

        if ($user) {
            // Jika sudah mengisi, redirect atau tampilkan pesan
            return redirect('/')->with('error', 'Anda sudah mengisi data.');
        }

        return view('auth.user-profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'nik' => 'required|max:16',
            'nkk' => 'required|max:16',
            'family_status' => 'required',
            'citizenship' => 'required',
            'religion' => 'required',
            'telephone_num' => 'required',
            'bod' => 'required',
            'pob' => 'required',
            'gender' => 'required',
            'house_id' => 'required',
            'is_primary' => 'required',
            // 'total_resident' => 'required', // Pastikan input ini ada di HTML
            // 'status'         => 'required', // Pastikan input ini ada di HTML
        ]);

        try {
            DB::transaction(function () use ($request) {
                $auth = Auth::user();

                UserProfile::create([
                    'user_id' => $auth->id,
                    'full_name' => $request->full_name,
                    'nik' => $request->nik,
                    'nkk' => $request->nkk,
                    'family_status' => $request->family_status,
                    'citizenship' => $request->citizenship,
                    'religion' => $request->religion,
                    'telephone_num' => $request->telephone_num,
                    'bod' => $request->bod,
                    'pob' => $request->pob,
                    'gender' => $request->gender,
                ]);

                UsersHouse::create([
                    'user_id' => $auth->id,
                    'house_id' => $request->house_id,
                    'is_primary' => $request->is_primary,
                    'total_resident' => $request->total_resident ?? 1,
                    'status' => ($request->is_primary == 'Rumah Utama') ? 'Dihuni' : 'Rumah Lain',
                ]);

                foreach ($request->group_a as $item) {
                    $user = Vehicles::create([
                        'user_id' => $auth->id,
                        'vehicle_types' => $item['vehicle_types'],
                        'plate_number' => $item['plate_number'],
                    ]);
                }
            });

            return redirect()->route('home')->with('success', 'Data Berhasil Disimpan!');

        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal simpan: ' . $e->getMessage());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
