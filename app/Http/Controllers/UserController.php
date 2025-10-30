<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allUser = User::with('countryNAME','cityNAME')
                       ->orderBy('user_id', 'desc')
                       ->paginate(5);
        // $allUser = User::all();
        $pageName = 'All Users';
        return view('User.index', compact('pageName', 'allUser'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
       
        $allCountry = country::all();
        $allCity = city::all();
        $pageName = 'add user';
        return view('Register', compact('pageName', 'allCountry', 'allCity'));
        
    }
public function getCities($country_id)
{
    $cities = city::where('country_id', $country_id)->get();
    return response()->json($cities);
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'userName'      => 'required|max:50',
        'email'         => 'required|email|unique:users,user_email',
        'password'      => 'required|min:6|same:confirm_password',
        'confirm_password' => 'required|min:6',
        'phone_no'      => 'required',
        'address'       => 'required',
        'country'       => 'required|exists:country,country_id',
        'city'          => 'required|exists:city,city_id',
       
    ]);

   $user = User::create([
        'user_name'     => $request->userName,
        'user_email'    => $request->email,
        'user_password' => bcrypt($request->password),
        'user_phone_no' => $request->phone_no,
        'user_address'  => $request->address,
        'country_id'    => $request->country,
        'city_id'       => $request->city,
        'user_status'   => 1,
    ]);


        // 👉 Naye user ko login karao
    Auth::login($user);

    return redirect()->route('users.index')->with('success', 'User registered successfully!');
}
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 
     $user = User::findOrFail($id);
    $allCountry = country::all();
    $allCity = city::where('country_id', $user->country_id)->get();
    $pageName = 'Edit User';
    return view('User.edit', compact('pageName','user','allCountry','allCity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'name'      => 'required|max:50',
        'email'     => 'required|email|unique:users,user_email,'.$id.',user_id',    //iska matlab: email unique honi chahiye lekin current user ki apni email allow hai.
        'phone_no'  => 'required',
        'address'   => 'required',
        'country'   => 'required|exists:country,country_id',
        'city'      => 'required|exists:city,city_id',
        'status'    => 'required|in:1,2',
    ]);

    $user = User::findOrFail($id);

    $user->update([
        'user_name'     => $request->name,
        'user_email'    => $request->email,
        'user_phone_no' => $request->phone_no,
        'user_address'  => $request->address,
        'country_id'    => $request->country,
        'city_id'       => $request->city,
        'user_status'   => $request->status,
    ]);

    return redirect()->route('users.index')->with('success', 'User updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        User::destroy($id);


        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }


    //   public function checkLogin()
    // {
        
    //       return view('login');
    // }
}
