<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\News;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.service.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.news.create');
    }

    public function exportPdf()
    {
        $news = News::all();
        $pdf = Pdf::loadView('exports.pdf.service.news', compact('news'));
        return $pdf->download('data-berita.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $request->validate([
            'title' => 'required',
            'image_subtitle' => 'required',
            'image' => 'required|image|max:5120',
            'news_types' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $news = new News();
        $lastRecord = News::latest('id')->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $years = date('Y');
        $codes = 'BTK-' . $years . '-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
        $news->code = $codes;
        $news->user_id = $user->id;
        $news->title = $request->title;
        $news->image_subtitle = $request->image_subtitle;
        $news->views = 0;
        $filePath = null;
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('news', 'public');
        }
        $news->image = $filePath;
        $news->news_types = $request->news_types;
        $news->description = $request->description;
        $news->status = $request->status;
        $news->save();
        return redirect()->route('service.news.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        $sessionKey = 'news_viewed_' . $id;

        if (!session()->has($sessionKey)) {
            $news->increment('views');
            session()->put($sessionKey, true);
        }
        return view('admin.service.news.detail', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('admin.service.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code' => 'required',
            'title' => 'required',
            'image' => 'required|image',
            'news_types' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $news = News::findOrFail($id);
        $news->code = $request->code;
        $news->title = $request->title;
        $filePatch = null;
        if ($request->hasFile('image')) {
            $filePatch = $request->file('image')->store('news', 'public');
        }
        $news->image = $filePatch;
        $news->news_types = $request->news_types;
        $news->description = $request->description;
        $news->status = $request->status;
        $news->save();
        return redirect()->route('service.news.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('service.news.index')->with('success', 'Data Berhasil Dihapus');
    }
}
