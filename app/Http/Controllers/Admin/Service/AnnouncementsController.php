<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\Announcements;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcement = Announcements::latest()->get();
        return view('admin.service.announcement.index', compact('announcement'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'subject' => 'required',
            'image' => 'required|image',
            'is_public' => 'required',
            'description' => 'required',
        ]);
        $announcement = new Announcements();
        $announcement->user_id = $user->id;
        $announcement->subject = $request->subject;
        $announcement->description = $request->description;
        $announcement->is_public = $request->is_public;
        $filePatch = null;
        if ($request->hasFile('image')) {
            $filePatch = $request->file('image')->store('announcement', 'public');
        }
        $announcement->image = $filePatch;

        $announcement->save();
        return redirect()->route('service.announcements.index')->with('success', 'Data Berhasil Ditambahkan');
    }

     public function exportPdf()
    {
        $ann = Announcements::all();
        $pdf = Pdf::loadView('exports.pdf.service.announcements', compact('ann'));
        return $pdf->download('data-pengumuman.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function publish(string $id)
    {
        $announcement = Announcements::findOrFail($id);

        if ($announcement->is_public == true) {
            $announcement->is_public = false;
            $announcement->save();
        } else {
            $announcement->is_public = true;
            $announcement->save();
        }

        return redirect()->route('service.announcements.index')->with('success', 'Status Berhasil Diubah');
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
        $user = Auth::user();
        $request->validate([
            'subject' => 'required',
            'image' => 'required|image',
            'is_public' => 'required',
            'description' => 'required',
        ]);
        $announcement = Announcements::findOrFail($id);
        $announcement->user_id = $user->id;
        $announcement->subject = $request->subject;
        $announcement->description = $request->description;
        $announcement->is_public = $request->is_public;
        $filePatch = null;
        if ($request->hasFile('image')) {
            $filePatch = $request->file('image')->store('announcement', 'public');
        }
        $announcement->image = $filePatch;

        $announcement->save();
        return redirect()->route('service.announcements.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $announcement = Announcements::findOrFail($id);
        $announcement->delete();
        return redirect()->route('service.announcements.index')->with('success', 'Data Berhasil Dihapus');
    }
}
