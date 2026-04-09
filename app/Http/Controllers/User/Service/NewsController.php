<?php

namespace App\Http\Controllers\User\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
{
    $mainNews = News::latest()->first();
    $recentNews = News::where('id', '!=', $mainNews->id)
                      ->latest()
                      ->limit(2)
                      ->get();
    $excludedIds = $recentNews->pluck('id')->push($mainNews->id);
    $otherNews = News::whereNotIn('id', $excludedIds)
                     ->latest()
                     ->paginate(16);

    return view('user.service.news.index', compact('mainNews', 'recentNews', 'otherNews'));
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
        $news = News::findOrFail($id);
        $sessionKey = 'news_viewed_' . $id;

        if (!session()->has($sessionKey)) {
            $news->increment('views');
            session()->put($sessionKey, true);
        }
        return view('user.service.news.detail', compact('news'));
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
