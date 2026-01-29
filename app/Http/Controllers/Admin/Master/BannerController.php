<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::latest()->get();
        return view('admin.master.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:250',
            'status' => 'required',
            'start_at' => 'required',
            'expired_at' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->status = $request->status;
        $banner->start_at = $request->start_at;
        $banner->expired_at = $request->expired_at;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banners', 'public');
            $banner->image = $path;
        }
        $banner->save();
        return redirect()->route('dashboard.banner.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.master.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required|max:250',
            'status' => 'required',
            'start_at' => 'required',
            'expired_at' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $banner = Banner::findOrFail($id);
        $banner->title = $request->title;
        $banner->status = $request->status;
        $banner->start_at = $request->start_at;
        $banner->expired_at = $request->expired_at;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banners', 'public');
            $banner->image = $path;
        }
        $banner->save();
        return redirect()->route('dashboard.banner.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return redirect()->route('dashboard.banner.index')->with('success', 'Data Berhasil Dihapus');
    }
}
