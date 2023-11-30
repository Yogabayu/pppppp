<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $skill = Skill::all();

            return view('admin.pages.skill',compact('skill'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        try {
            $skill          = new Skill;
            $skill->user_uuid    = auth()->user()->uuid; 
            $skill->name    = $request->name; 
            $skill->value    = $request->value; 
            $skill->icon    = $request->icon;
            $skill->save();
            
            return back()->with('success','Berhasil menambahkan data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillRequest $request, $id)
    {
        try {
            $skill          = Skill::findOrFail($id);
            $skill->name    = $request->name; 
            $skill->value    = $request->value; 
            $skill->icon    = $request->icon;
            $skill->save();
            
            return back()->with('success','Berhasil update data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $skill = Skill::findOrFail($id);
            $skill->delete();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
