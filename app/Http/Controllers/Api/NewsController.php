<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        $res = [
            'success' => true,
            'data' => $news,
            'message' => 'Berita',
        ];
        return response()->json($res, 200);
    }
}
