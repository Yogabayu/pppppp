<?php

namespace App\Http\Controllers;

use App\Models\Portofolios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                'link' => 'url|nullable',
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

            $extension = $request->file('photo')->extension();
            $imgname = date('dmyHis') . '.' . $extension;
            $path = $request->file('photo')->storeAs('public/photos/project', $imgname);
            $project->photo = $imgname;

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
            $request->validate([
                'title' => 'required',
                'short_desc' => 'required',
                'long_desc' => 'required',
                'link' => 'url|nullable',
                'status' => 'required',
                'photo' => 'max:2048',
            ], [
                'title.required' => 'Judul Project is required.',
                'short_desc.required' => 'Deskripsi singkat is required.',
                'long_desc.required' => 'Deskripsi lengkap is required.',
                'status.required' => 'Status is required.',
                'link.url' => 'Link project must be a valid URL.',
                'photo.max' => 'The file must be less than 2048 kilobytes.',
            ]);

            $project = Portofolios::findOrFail($id);
            $project->user_uuid = auth()->user()->uuid;
            $project->title = $request->title;
            $project->short_desc = $request->short_desc;
            $project->long_desc = $request->long_desc;
            $project->link = $request->link;
            $project->status = $request->status;

            if ($request->hasFile('photo')) {
                $extension = $request->file('photo')->extension();
                $imgname = date('dmyHis') . '.' . $extension;
                $path = $request->file('photo')->storeAs('public/photos/project', $imgname);

                if ($project->photo) {
                    Storage::delete("public/photos/project/{$project->photo}");
                }

                $project->photo = $imgname;
            }

            $project->save();

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
            $project = Portofolios::where('id', $id)->first();

            if ($project) {
                if ($project->photo) {
                    Storage::delete("public/photos/project/{$project->photo}");
                }

                $project->delete();

                return redirect()->back()->with('success', 'Berhasil menghapus data');
            }
            return redirect()->back()->with('error', 'Unknown User Data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
