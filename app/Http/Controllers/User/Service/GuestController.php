<?php

namespace App\Http\Controllers\User\Service;

use App\Http\Controllers\Controller;
use App\Models\Master\CommunityUnit;
use App\Models\Master\GuestTypes;
use App\Models\Resident\Guest;
use Auth;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guest = Guest::where('user_id', Auth::id())
            ->latest()
            ->paginate(6);
        $guestTypes = GuestTypes::all();
        $co = CommunityUnit::all();
        return view('user.service.guest.index', compact('guest', 'guestTypes', 'co'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $guest = new Guest();
        $guest->user_id = Auth::id();
        $guest->house_id = $request->house_id;
        $guest->guest_types = $request->guest_types;
        $guest->name = $request->name;
        $guest->telephone_num = $request->telephone_num;
        $guest->guest_amount = $request->guest_amount;
        $guest->save();
        return redirect()->route('services.guest.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guest = Guest::findOrFail($id);
        return view('user.service.guest.detail',compact('guest'));
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
