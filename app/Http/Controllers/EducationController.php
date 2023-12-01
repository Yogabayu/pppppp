<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            dd('belum selesai');
            $skills = Education::all();

            return view('admin.pages.skill',compact('skills'));
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
    public function store(EducationRequest $request)
    {
        try {
            $skill          = new Education;
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
    public function update(EducationRequest $request, $id)
    {
        try {
            $skill          = Education::findOrFail($id);
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
            $skill = Education::findOrFail($id);
            $skill->delete();
            return back()->with('success','Berhasil menambah data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
