<?php

namespace App\Http\Controllers\Admin\Resident;

use App\Http\Controllers\Controller;
use App\Models\Resident\Guest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guest = Guest::all();
        return view('admin.resident.guest.index', compact('guest'));
    }

    public function exportPdf()
    {
        $guest = Guest::all();
        $pdf = Pdf::loadView('exports.pdf.residents.guest', compact('guest'));
        return $pdf->download('data-lapor-tamu.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();
        return redirect()->route('resident.guest.index')->with('success', 'Data Berhasil Dihapus');
    }
}
