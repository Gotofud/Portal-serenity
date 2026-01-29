<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service\Report;
use Auth;
use Illuminate\Http\Request;
use Validator;

class ReportController extends Controller
{

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
        $report = new Report();
        $report->subject = $request->subject;
        $report->description = $request->description;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('reports', 'public');
            $report->image = $path;
        }
        $report->sent_At = now();
        $report->user_id = Auth::id();
        $report->save();

        $res = [
            'success' => true,
            'data' => $report,
            'message' => 'Berhasil Membuat Laporan'
        ];
        return response()->json($res, 201);

    }
}
