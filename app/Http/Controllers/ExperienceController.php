<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $exps = Experience::all();

            return view('admin.pages.experience', compact('exps'));
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
            $exp = new Experience;
            $exp->user_uuid = auth()->user()->uuid;
            $exp->office = $request->office;
            $exp->position = $request->position;
            $exp->start = $request->start;
            $exp->end = $request->end;
            $exp->desc = $request->desc;
            $exp->type = $request->type;
            $exp->save();

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
            $exp = Experience::findOrFail($id);
            $exp->user_uuid = auth()->user()->uuid;
            $exp->office = $request->office;
            $exp->position = $request->position;
            $exp->start = $request->start;
            $exp->end = $request->end;
            $exp->desc = $request->desc;
            $exp->type = $request->type;
            $exp->save();

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
            $skill = Experience::findOrFail($id);
            $skill->delete();
            return back()->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
