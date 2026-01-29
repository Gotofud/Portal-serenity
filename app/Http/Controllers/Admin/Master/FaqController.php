<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faq = Faq::latest()->get();
        return view('admin.master.faq.index', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|max:250',
            'answer' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $faq = new Faq();
        $faq->subject = $request->subject;
        $faq->answer = $request->answer;
        $faq->category = $request->category;
        $faq->status = $request->status;
        $faq->save();

        return redirect()->route('dashboard.faq.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $faq = Faq::findOrFail($id);
        return view('admin.master.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'subject' => 'required|max:250',
            'answer' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->subject = $request->subject;
        $faq->answer = $request->answer;
        $faq->category = $request->category;
        $faq->status = $request->status;
        $faq->save();

        return redirect()->route('dashboard.faq.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $faq = Faq::findOrFail($id);
       $faq->delete();
       
       return redirect()->route('dashboard.faq.index')->with('success', 'Data Berhasil Dihapus');
    }
}
