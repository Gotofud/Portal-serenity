<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resident\Guest;
use Auth;
use Illuminate\Http\Request;
use Validator;

class GuestReportController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $guest = Guest::where('user_id', $user)->latest()->get();
        $res = [
            'success' => true,
            'data' => $guest,
            'message' => 'Kios',
        ];
        return response()->json($res, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guest_types' => 'required',
            'guest_amount' => 'required',
            'visit_at' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }
        $guest = new Guest();
        $guest->user_id = Auth::id();
        $guest->guest_amount = $request->guest_amount;
        $guest->guest_types = $request->guest_types;
        $guest->visit_at = $request->visit_at;
        $guest->save();

        $res = [
            'success' => true,
            'data' => $guest,
            'message' => 'Berhasil Menambahkan Tamu'
        ];
        return response()->json($res, 201);
    }
}
