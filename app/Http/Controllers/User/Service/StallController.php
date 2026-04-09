<?php

namespace App\Http\Controllers\User\Service;

use App\Http\Controllers\Controller;
use App\Models\Master\StallPlace;
use App\Models\Service\Stall;
use Illuminate\Http\Request;

class StallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stall = StallPlace::where('status', 'Aktif')
            ->withCount([
                'stalls' => function ($q) {
                    $q->where('status', 'Aktif'); // hanya yang sedang disewa
                }
            ])
            ->latest()
            ->paginate(10);
        return view('user.service.stall.index', compact('stall'));
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

    public function show($id)
    {
        $stall = StallPlace::withCount([
            'stalls' => function ($q) {
                $q->where('status', 'Aktif');
            }
        ])->with('stalls')->findOrFail($id);

        return view('user.service.stall.detail', compact('stall'));
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
