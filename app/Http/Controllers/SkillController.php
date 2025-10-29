<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allSkill = Skill::orderBy('id', 'desc')->paginate(10);
        $pageName = 'All Skills';
        return view('skill.index', compact('pageName', 'allSkill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageName = 'Add New Skill';
        return view('skill.create', compact('pageName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:skills,name',
        ], [
            'name.required' => 'Skill name is required.',
            'name.unique'   => 'This skill already exists.',
        ]);

        Skill::create([
            'name' => $request->name,
        ]);

        return redirect()->route('skill.index')
                         ->with('success', 'Skill added successfully!');
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
        $pageName = 'Edit Skill';
        $skill = Skill::findOrFail($id);
        return view('skill.edit', compact('skill', 'pageName'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:100|unique:skills,name,' . $id,
        ], [
            'name.required' => 'Skill name is required.',
            'name.unique' => 'This skill already exists.',
        ]);

        // Update
        $skill = Skill::findOrFail($id);
        $skill->name = $request->name;
        $skill->save();

        return redirect()->route('skill.index')
                         ->with('success', 'Skill updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Skill::destroy($id);
        return redirect()->route('skill.index')->with('success', 'Skill deleted successfully!');
    }
}
