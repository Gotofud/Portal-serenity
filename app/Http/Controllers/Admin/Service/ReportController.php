<?php

namespace App\Http\Controllers\Admin\Service;
use App\Enums\ReportStatus;
use App\Http\Controllers\Controller;
use App\Mail\ReportEmail;
use App\Models\Service\Report;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report = Report::latest()->with('users.user_profile')->get();
        return view('admin.service.report.index', compact('report'));
    }
    public function exportPdf()
    {
        $report = Report::all();
        $pdf = Pdf::loadView('exports.pdf.service.report', compact('report'));
        return $pdf->download('data-laporan.pdf');
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
        return view('admin.service.report.detail', compact('report'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->route('service.report.index')->with('success', 'Data Berhasil Dihapus');
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

        Mail::to($report->users->email)->send(
            new ReportEmail(
                $report,
                $request->acc_reply ?? '-',
                ReportStatus::ACCEPTED
            )
        );

        return back()->with('success', 'Laporan berhasil diterima');
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

        Mail::to($report->users->email)->send(
            new ReportEmail(
                $report,
                $request->reply ?? '-',
                ReportStatus::FINISHED
            )
        );

        return back()->with('success', 'Laporan berhasil diselesaikan');
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

        Mail::to($report->users->email)->send(
            new ReportEmail(
                $report,
                $request->rejected_reply ?? '-',
                ReportStatus::REJECTED
            )
        );

        return back()->with('success', 'Laporan berhasil ditolak');
    }
}
