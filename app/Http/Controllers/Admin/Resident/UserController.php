<?php

namespace App\Http\Controllers\Admin\Resident;
use App\Http\Controllers\Controller;
use App\Models\Finance\CommunityUnitAggrements;
use App\Models\Resident\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::whereHas('roles', function ($role) {
            $role->whereIn('name', ['Resident', 'Onboarding']);
        })
            ->with('user_profile')
            ->get();

        $userCount = $user->count();
        $userActive = $user->where('status', 'Aktif')->count();
        $userBanned = $user->where('status', 'Nonaktif')->count();
        return view('admin.resident.user.index', compact('user', 'userCount', 'userActive', 'userBanned'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('user_profile', 'user_house', 'user_vehicle')->findOrFail($id);
        $house = $user->user_house->houses ?? null;
        if ($house) {
            $agreement = CommunityUnitAggrements::where('building_types_id', $house->building_types_id)->first();
            return view('admin.resident.user.detail', compact('user', 'agreement'));
        } else {
            return view('admin.resident.user.detail', compact('user'));
        }

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
