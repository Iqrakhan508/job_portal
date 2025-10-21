<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCategory;

class JobCategoryController extends Controller
{
    public function index()
    {
        $pageName = 'All Job Categories';
        $all = JobCategory::orderBy('id', 'desc')->paginate(10);
        return view('job_categories.index', compact('pageName', 'all'));
    }

    public function create()
    {
        $pageName = 'Add New Job Category';
        return view('job_categories.create', compact('pageName'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:job_categories,name',
        ]);

        JobCategory::create($validated);
        return redirect()->route('job_categories.index')->with('success', 'Job category added successfully!');
    }

    public function edit(int $id)
    {
        $pageName = 'Edit Job Category';
        $jobCategory = JobCategory::findOrFail($id);
        return view('job_categories.edit', compact('pageName', 'jobCategory'));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:job_categories,name,' . $id . ',id',
        ]);

        $jobCategory = JobCategory::findOrFail($id);
        $jobCategory->update($validated);

        return redirect()->route('job_categories.index')->with('success', 'Job category updated successfully!');
    }

    public function destroy(int $id)
    {
        JobCategory::destroy($id);
        return redirect()->route('job_categories.index')->with('success', 'Job category deleted successfully!');
    }
}


