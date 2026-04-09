<?php

namespace App\Http\Controllers\User\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\Announcements;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcements::where('is_public', true)->latest()->paginate(10);
        return view('user.service.announcements.index', compact('announcements'));
    }

    public function show($id)
    {
        $announcements = Announcements::findOrFail($id);
        return view('user.service.announcements.detail', compact('announcements'));
    }
}
