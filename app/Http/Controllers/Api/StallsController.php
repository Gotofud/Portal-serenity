<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Master\StallPlace;
use App\Models\Service\Stall;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Validator;

class StallsController extends Controller
{
    public function index()
    {
        $stall = StallPlace::latest()->get();
        $res = [
            'success' => true,
            'data' => $stall,
            'message' => 'Kios',
        ];
        return response()->json($res, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }
    }
}
