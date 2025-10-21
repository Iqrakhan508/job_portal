<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\city;
use App\Models\country;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $allCity = city::with('iqraKhan')->paginate(5); 
          
        //  $allCity = city::all();
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

        ]);

        city::create([
            'country_id' => $request->country,
            'city_name' => $request->city
        ]);

        return redirect()->route('city.index')->with('success', 'city added successfully!');
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
    $city = city::findOrFail($id);   // city ka record find karo
    $allCountry = country::all();    // dropdown ke liye sab countries lao
    $pageName = 'Edit City';
    return view('city.edit', compact('pageName', 'city', 'allCountry'));
}

public function update(Request $request, string $id)
{
    $request->validate([
        'country' => 'required|exists:country,country_id',
        'city' => 'required|string|max:100|unique:city,city_name,' . $id . ',city_id',
    ]);

    $city = city::findOrFail($id);
    $city->update([
        'country_id' => $request->country,
        'city_name' => $request->city,
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
