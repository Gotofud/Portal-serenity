<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service\Ads;
use Auth;
use Illuminate\Http\Request;
use Validator;

class AdsController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'active_day' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }
        $ads = new Ads();
        $ads->user_id = Auth::id();
        $ads->subject = $request->subject;
        $ads->description = $request->description;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('ads', 'public');
            $ads->image = $path;
        }
        $ads->status = 'Aktif';
        $ads->start_at = now();
        $ads->active_day = $request->active_day;
        $ads->save();
        
        $res = [
            'success' => true,
            'data' => $ads,
            'message' => 'Berhasil Membuat Iklan'
        ];
        return response()->json($res, 201);
    }
}
