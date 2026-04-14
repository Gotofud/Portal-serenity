<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\Stall;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class StallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stall = Stall::all();
        return view('admin.service.stall.index', compact('stall'));
    }

    public function exportPdf()
    {
        $stall = Stall::all();
        $pdf = Pdf::loadView('exports.pdf.service.stall', compact('stall'));
        return $pdf->download('data-kios.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stall = Stall::findOrFail($id);
        return view('admin.service.stall.detail', compact('stall'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stall = Stall::findOrFail($id);
        $stall->delete();
        return redirect()->route('service.stall.index')->with('success', 'Data Berhasil Dihapus');
    }
}
