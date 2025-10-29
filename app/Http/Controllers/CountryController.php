<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;  


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $allCountry = country::where('country_status', 1)
                              ->orderBy('country_id', 'desc')
                              ->paginate(10); 
        $pageName = 'All Countries';
        return view('country.index', compact('pageName', 'allCountry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageName = 'Add New Country';
        return view('country.create', compact('pageName'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'country_name' => 'required|string|max:100|unique:country,country_name',
    ], [
        'country_name.required' => 'Country name is required.',
        'country_name.unique'   => 'This country already exists.',
    ]);

    Country::create([
        'country_name' => $request->country_name,
        'country_status' => 1, // default active
    ]);

    return redirect()->route('country.index')
                     ->with('success', 'Country added successfully!');
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
    $country = Country::findOrFail($id);
    $pageName = 'Edit Country';
    return view('country.edit', compact('pageName', 'country'));
}

public function update(Request $request, string $id)
{
    $request->validate([
        'country_name' => 'required|string|max:100|unique:country,country_name,' . $id . ',country_id',
    ], [
        'country_name.required' => 'Country name is required.',
        'country_name.unique' => 'This country already exists.',
    ]);

    $country = Country::findOrFail($id);
    $country->update([
        'country_name' => $request->country_name,
    ]);

    return redirect()->route('country.index')
                     ->with('success', 'Country updated successfully!');
}





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        country::destroy($id); 

        
    return redirect()->route('country.index')->with('success', 'Country deleted successfully!');
    }

   

}



 //      public function myTesting()
    //     {
    //        $colors = [
    //     'first' => 'red',
    //     'second' => 'green',
    //     'fifth' => 'pink'
    // ];

    //         return view('country.testing', compact('colors'));
    //     }