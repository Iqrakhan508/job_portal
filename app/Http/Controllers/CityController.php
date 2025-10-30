<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // Show only Pakistan cities (country_id = 1)
          $allCity = city::with('iqraKhan')
                        ->where('country_id', 1)
                        ->orderBy('city_id', 'desc')
                        ->paginate(10); 
          
        $pageName = 'All Cities';
        return view('city.index', compact('pageName','allCity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCountry = country::all();
        $pageName = 'Add New City';
        return view('city.create', compact('pageName', 'allCountry'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required|exists:country,country_id',
            'city' => 'required|string|max:100|unique:city,city_name',
            'city_description' => 'nullable|string',
        ], [
            'country.required' => 'Country is required.',
            'country.exists' => 'Selected country is invalid.',
            'city.required' => 'City name is required.',
            'city.unique' => 'This city already exists.',
        ]);

        city::create([
            'country_id' => $request->country,
            'city_name' => $request->city,
            'city_description' => $request->city_description
        ]);

        return redirect()->route('city.index')->with('success', 'City added successfully!');
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
    $city = city::findOrFail($id);
    $allCountry = country::all();
    $pageName = 'Edit City';
    return view('city.edit', compact('pageName', 'city', 'allCountry'));
}

public function update(Request $request, string $id)
{
    $request->validate([
        'country' => 'required|exists:country,country_id',
        'city' => 'required|string|max:100|unique:city,city_name,' . $id . ',city_id',
        'city_description' => 'nullable|string',
    ], [
        'country.required' => 'Country is required.',
        'country.exists' => 'Selected country is invalid.',
        'city.required' => 'City name is required.',
        'city.unique' => 'This city already exists.',
    ]);

    $city = city::findOrFail($id);
    $city->update([
        'country_id' => $request->country,
        'city_name' => $request->city,
        'city_description' => $request->city_description,
    ]);

    return redirect()->route('city.index')->with('success', 'City updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         city::destroy($id); 

        
    return redirect()->route('city.index')->with('success', 'City deleted successfully!');
    }
}
