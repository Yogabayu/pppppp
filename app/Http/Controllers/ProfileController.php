<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $profile = Profile::where('user_uuid', Auth::user()->uuid)->first();

            return view('admin.pages.profile', compact('profile'))->with('success', 'Berhasil mendapatkan data profile');
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
    public function update(ProfileRequest $request, $id)
    {
        try {
            $profile = Profile::where('id', $id)->first();

            if (!$profile) {
                return redirect()->back()->with('error', 'Profile not found.');
            }

            if ($request->hasFile('photo1')) {
                Storage::delete('public/' . $profile->photo1);
            }

            if ($request->hasFile('photo2')) {
                Storage::delete('public/' . $profile->photo2);
            }

            $profile->update([
                'name' => $request->input('name'),
                'desc' => $request->input('desc'),
                'telp' => $request->input('telp'),
                'website' => $request->input('website'),
                'twitter' => $request->input('twitter'),
                'facebook' => $request->input('facebook'),
                'instagram' => $request->input('instagram'),
                'linkedin' => $request->input('linkedin'),
                'freelance' => $request->input('freelance'),
                'address' => $request->input('address'),
            ]);

            // Handle file uploads (if present)
            if ($request->hasFile('photo1')) {
                $photo1Path = $request->file('photo1')->storeAs('photos/photo1', 'photo1.jpg', 'public');
                $profile->photo1 = $photo1Path;
            }

            if ($request->hasFile('photo2')) {
                $photo2Path = $request->file('photo2')->storeAs('photos/photo2', 'photo2.jpg', 'public');
                $profile->photo2 = $photo2Path;
            }

            $profile->save();

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
