<?php

namespace App\Http\Controllers\Admin\Service;
use App\Http\Controllers\Controller;
use App\Models\Service\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report = Report::latest()->with('users.user_profile')->get();
        return view('admin.service.report.index',compact('report'));
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
        $report = Report::findOrFail($id);
        return view('admin.service.report.detail',compact('report'));
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

    /**
     * Accept report
     */
    public function accept(Request $request, Report $report)
    {
        $request->validate([
            'acc_reply' => 'nullable|string',
        ]);

        $report->update([
            'status' => 'Diterima',
            'accepted_at' => now(),
            'acc_reply' => $request->acc_reply,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil diterima');
    }

    /**
     * Complete report
     */
    public function complete(Request $request, Report $report)
    {
        $request->validate([
            'reply' => 'nullable|string',
        ]);

        $report->update([
            'status' => 'Selesai',
            'replied_at' => now(),
            'reply' => $request->reply,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil diselesaikan');
    }

    /**
     * Reject report
     */
    public function reject(Request $request, Report $report)
    {
        $request->validate([
            'rejected_reply' => 'nullable|string',
        ]);

        $report->update([
            'status' => 'Ditolak',
            'rejected_at' => now(),
            'rejected_reply' => $request->rejected_reply,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil ditolak');
    }
}
