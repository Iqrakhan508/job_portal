<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdsPosition;
use App\Models\AddCompany;
use App\Models\MultiplePosition;

class AdsPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allAdsPositions = AdsPosition::orderBy('id', 'desc')->paginate(10);
        $pageName = 'All Ads Positions';
        return view('ads_position.index', compact('pageName', 'allAdsPositions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = AddCompany::where('active', 1)->get();
        $positions = MultiplePosition::all();
        $pageName = 'Add New Ads Position';
        return view('ads_position.create', compact('pageName', 'companies', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ads_position' => 'required|string|max:255',
            'ads_company' => 'required|string|max:255',
            'ads_code' => 'required|string'
        ]);

        AdsPosition::create([
            'ads_position' => $request->ads_position,
            'ads_company' => $request->ads_company,
            'ads_code' => $request->ads_code
        ]);

        return redirect()->route('ads_position.index')->with('success', 'Ads Position added successfully!');
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
        $adsPosition = AdsPosition::findOrFail($id);
        $companies = AddCompany::where('active', 1)->get();
        $positions = MultiplePosition::all();
        $pageName = 'Edit Ads Position';
        return view('ads_position.edit', compact('pageName', 'adsPosition', 'companies', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ads_position' => 'required|string|max:255',
            'ads_company' => 'required|string|max:255',
            'ads_code' => 'required|string'
        ]);

        $adsPosition = AdsPosition::findOrFail($id);
        $adsPosition->update([
            'ads_position' => $request->ads_position,
            'ads_company' => $request->ads_company,
            'ads_code' => $request->ads_code
        ]);

        return redirect()->route('ads_position.index')->with('success', 'Ads Position updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AdsPosition::destroy($id);
        return redirect()->route('ads_position.index')->with('success', 'Ads Position deleted successfully!');
    }
}
