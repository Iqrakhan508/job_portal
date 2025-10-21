<?php

namespace App\Http\Controllers;

use App\Models\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{
    public function index()
    {
        $all = EducationLevel::orderBy('rank', 'desc')->orderBy('id', 'desc')->paginate(10);
        $pageName = 'Education Levels';
        return view('education_levels.index', compact('all', 'pageName'));
    }

    public function create()
    {
        $pageName = 'Add New Education Level';
        return view('education_levels.create', compact('pageName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:education_levels,name',
            'rank' => 'nullable|integer|min:0|max:127',
        ]);

        EducationLevel::create([
            'name' => $request->name,
            'rank' => $request->rank ?? 0,
        ]);

        return redirect()->route('education_levels.index')->with('success', 'Education Level added successfully!');
    }

    public function edit(int $id)
    {
        $pageName = 'Edit Education Level';
        $educationLevel = EducationLevel::findOrFail($id);
        return view('education_levels.edit', compact('educationLevel', 'pageName'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:education_levels,name,' . $id,
            'rank' => 'nullable|integer|min:0|max:127',
        ]);

        $educationLevel = EducationLevel::findOrFail($id);
        $educationLevel->name = $request->name;
        $educationLevel->rank = $request->rank ?? 0;
        $educationLevel->save();

        return redirect()->route('education_levels.index')->with('success', 'Education Level updated successfully!');
    }

    public function destroy(int $id)
    {
        EducationLevel::destroy($id);
        return redirect()->route('education_levels.index')->with('success', 'Education Level deleted successfully!');
    }
}


