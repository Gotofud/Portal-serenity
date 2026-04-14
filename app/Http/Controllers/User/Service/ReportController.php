<?php

namespace App\Http\Controllers\User\Service;

use App\Http\Controllers\Controller;
use App\Models\Master\ReportCategories;
use App\Models\Service\Report;
use Auth;
use Illuminate\Http\Request;
use Str;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report = Report::where('user_id', Auth::id())->latest()->paginate(6);
        return view('user.service.report.index',compact('report'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reportCat = ReportCategories::all();
        return view('user.service.report.form', compact('reportCat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'report_category' => 'required|exists:report_categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'camera_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
        } elseif ($request->hasFile('camera_image')) {
            $file = $request->file('camera_image');
        }

        $imagePath = null;

        if ($file) {
            $imagePath = $file->store('reports', 'public');
        }

        $code = 'RPT-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4));

        // SIMPAN DATA
        \App\Models\Service\Report::create([
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'description' => $request->description,
            'report_category' => $request->report_category,
            'image' => $imagePath,
            'code' => $code,
            'status' => 'pending', // default
        ]);

        return redirect()
            ->route('services.report.index')
            ->with('success', 'Laporan berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $report = Report::findOrFail($id);
        return view('user.service.report.detail',compact('report'));
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
