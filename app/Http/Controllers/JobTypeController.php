<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = JobType::orderBy('id', 'desc')->paginate(10);
        $pageName = 'Job Types';
        return view('job_types.index', compact('all', 'pageName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageName = 'Add New Job Type';
        return view('job_types.create', compact('pageName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:job_types,name',
        ]);

        JobType::create([
            'name' => $request->name,
        ]);

        return redirect()->route('job_types.index')->with('success', 'Job Type added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $pageName = 'Edit Job Type';
        $jobType = JobType::findOrFail($id);
        return view('job_types.edit', compact('jobType', 'pageName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:job_types,name,' . $id,
        ]);

        $jobType = JobType::findOrFail($id);
        $jobType->name = $request->name;
        $jobType->save();

        return redirect()->route('job_types.index')->with('success', 'Job Type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        JobType::destroy($id);
        return redirect()->route('job_types.index')->with('success', 'Job Type deleted successfully!');
    }
}


