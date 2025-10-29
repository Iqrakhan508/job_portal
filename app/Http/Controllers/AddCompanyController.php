<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddCompany;

class AddCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCompanies = AddCompany::paginate(10);
        $pageName = 'All Companies';
        return view('add_company.index', compact('pageName', 'allCompanies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageName = 'Ads New Company';
        return view('add_company.create', compact('pageName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'code' => 'required|string',
            'active' => 'required|boolean'
        ]);

        AddCompany::create([
            'company_name' => $request->company_name,
            'code' => $request->code,
            'is_auto' => $request->has('is_auto') ? 1 : 0,
            'active' => $request->active
        ]);

        return redirect()->route('add_company.index')->with('success', 'Ads Company added successfully!');
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
        $company = AddCompany::findOrFail($id);
        $pageName = 'Edit Company';
        return view('add_company.edit', compact('pageName', 'company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'code' => 'required|string',
            'active' => 'required|boolean'
        ]);

        $company = AddCompany::findOrFail($id);
        $company->update([
            'company_name' => $request->company_name,
            'code' => $request->code,
            'is_auto' => $request->has('is_auto') ? 1 : 0,
            'active' => $request->active
        ]);

        return redirect()->route('add_company.index')->with('success', 'Ads Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AddCompany::destroy($id);
        return redirect()->route('add_company.index')->with('success', 'Ads Company deleted successfully!');
    }
}
