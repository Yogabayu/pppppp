<?php

namespace App\Http\Controllers;

use App\Models\Portofolios;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // dd('masuk');
            $projects = Portofolios::where('user_uuid', auth()->user()->uuid)->get();

            return view('admin.pages.project', compact('projects'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
            $request->validate([
                'title' => 'required',
                'short_desc' => 'required',
                'long_desc' => 'required',
                'link' => 'url',
                'status' => 'required',
                'photo' => 'required|max:2048',
            ], [
                'title.required' => 'Judul Project is required.',
                'short_desc.required' => 'Deskripsi singkat is required.',
                'long_desc.required' => 'Deskripsi lengkap is required.',
                'status.required' => 'Status is required.',
                'link.url' => 'Link project must be a valid URL.',
                'photo.required' => 'Photo project is required.',
                'photo.max' => 'The file must be less than 2048 kilobytes.',
            ]);
            // dd($request->all());

            $project = new Portofolios;
            $project->user_uuid = auth()->user()->uuid;
            $project->title = $request->title;
            $project->short_desc = $request->short_desc;
            $project->long_desc = $request->long_desc;
            $project->link = $request->link;
            $project->status = $request->status;

            $photoPath = $request->file('photo')->store('photos/project', 'public');
            $project->photo = $photoPath;

            $project->save();

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
            //code...
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
            //code...
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
