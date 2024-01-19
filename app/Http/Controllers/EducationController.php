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
            $edus = Education::all();

            return view('admin.pages.education', compact('edus'));
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
            $edu                  = new Education;
            $edu->user_uuid       = auth()->user()->uuid;
            $edu->sekolah         = $request->sekolah;
            $edu->jurusan         = $request->jurusan;
            $edu->start           = $request->start;
            $edu->end             = $request->end;
            $edu->desc            = $request->desc;
            $edu->save();

            return back()->with('success', 'Berhasil menambahkan data');
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
    public function update(Request $request, $id)
    {
        try {
            $edu                  = Education::findOrFail($id);
            $edu->user_uuid       = auth()->user()->uuid;
            $edu->sekolah         = $request->sekolah;
            $edu->jurusan         = $request->jurusan;
            $edu->start           = $request->start;
            $edu->end             = $request->end;
            $edu->desc            = $request->desc;
            $edu->save();

            return back()->with('success', 'Berhasil update data');
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
            return back()->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
