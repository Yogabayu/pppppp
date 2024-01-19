<?php

namespace App\Http\Controllers;

use App\Models\softerience;
use App\Models\Softskill;
use Illuminate\Http\Request;

class SoftSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $softs = Softskill::all();

            return view('admin.pages.softskill', compact('softs'));
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
    public function store(Request $request)
    {
        try {
            $soft                = new Softskill;
            $soft->user_uuid     = auth()->user()->uuid;
            $soft->icon          = $request->icon;
            $soft->softskill      = $request->softskill;
            $soft->short_desc         = $request->short_desc;
            $soft->is_see          = $request->is_see;
            $soft->save();

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
    public function update(Request $request, string $id)
    {
        try {
            $soft                = Softskill::findOrFail($id);
            $soft->user_uuid     = auth()->user()->uuid;
            $soft->icon          = $request->icon;
            $soft->softskill      = $request->softskill;
            $soft->short_desc         = $request->short_desc;
            $soft->is_see          = $request->is_see;
            $soft->save();

            return redirect()->back()->with('success', 'Berhasil update data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $skill = Softskill::findOrFail($id);
            $skill->delete();
            return back()->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
