<?php

namespace App\Http\Controllers\Admin\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\CommunityUnitAggrements;
use App\Models\Master\BuildingType;
use App\Models\Master\CommunityUnit;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agreement = CommunityUnitAggrements::all();
        $co = CommunityUnit::all();
        $building_type = BuildingType::all();
        return view('admin.finance.agreement.index', compact('agreement', 'building_type', 'co'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bill_amount' => 'required',
            'community_id' => 'required',
            'building_types_id' => 'required',
            'status' => 'required',
        ]);

        $agreement = new CommunityUnitAggrements();
        $agreement->community_id = $request->community_id;
        $agreement->building_types_id = $request->building_types_id;
        $agreement->bill_amount = str_replace('.', '', $request->bill_amount);
        $agreement->status = $request->status;
        $agreement->save();
        return redirect()->route('finance.agreement.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'bill_amount' => 'required',
            'community_id' => 'required',
            'building_types_id' => 'required',
            'status' => 'required',
        ]);

        $agreement = CommunityUnitAggrements::findOrFail($id);
        $agreement->community_id = $request->community_id;
        $agreement->building_types_id = $request->building_types_id;
        $agreement->bill_amount = str_replace('.', '', $request->bill_amount);
        $agreement->status = $request->status;
        $agreement->save();
        return redirect()->route('finance.agreement.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
