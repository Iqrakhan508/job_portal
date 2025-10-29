<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCompany = Company::orderBy('id', 'desc')->paginate(10);
        $pageName = 'All Companies';
        return view('company.index', compact('pageName', 'allCompany'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageName = 'Add New Company';
        return view('company.create', compact('pageName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'Company name is required.',
        ]);

        Company::create([
            'name' => $request->name,
            'industry' => $request->industry,
            'location' => $request->location,
            'company_size' => $request->company_size,
            'description' => $request->description,
        ]);

        return redirect()->route('company.index')
                         ->with('success', 'Company added successfully!');
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
    public function edit($id)
    {
        $pageName = 'Edit Company';
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company', 'pageName'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'Company name is required.',
        ]);

        // Update
        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->industry = $request->industry;
        $company->location = $request->location;
        $company->company_size = $request->company_size;
        $company->description = $request->description;
        $company->save();

        return redirect()->route('company.index')
                         ->with('success', 'Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Company::destroy($id);
        return redirect()->route('company.index')->with('success', 'Company deleted successfully!');
    }
}
