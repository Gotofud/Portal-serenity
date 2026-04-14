<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service\Announcements;
use Illuminate\Http\Request;

class Annoucement extends Controller
{
    public function index()
    {
        $ann = Announcements::latest()->get();
        $res = [
            'success' => true,
            'data' => $ann,
            'message' => 'Pengumuman',
        ];
        return response()->json($res, 200);
    }
}
