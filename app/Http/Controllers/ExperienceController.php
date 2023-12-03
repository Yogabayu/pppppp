<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $uuid = auth()->user()->uuid;
            $exps = Experience::where('user_uuid',$uuid)->get();
        
            return view('admin.pages.experience',compact('exps'));
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
        // dd($request->all());
        try {
            $exp                = new Experience;
            $exp->user_uuid     = auth()->user()->uuid; 
            $exp->office    = $request->office; 
            $exp->position    = $request->position; 
            $exp->start    = $request->start;
            $exp->end    = $request->end;
            $exp->desc    = $request->desc;
            $exp->type    = $request->type;
            $exp->save();
            Alert::success(session('success'));
            return back()->with('success','Berhasil menambahkan data');
        } catch (\Exception $e) {
            Alert::success(session('success'));
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
    public function update(ExperienceRequest $request, $id)
    {
        try {
            $exp          = Experience::findOrFail($id);
            $exp->user_uuid     = auth()->user()->uuid; 
            $exp->office    = $request->office; 
            $exp->position    = $request->position; 
            $exp->start    = $request->start;
            $exp->end    = $request->end;
            $exp->desc    = $request->desc;
            $exp->type    = $request->type;
            $exp->save();
            
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
            $exp = Experience::findOrFail($id);
            $exp->delete();
            return back()->with('success','Berhasil menghapus data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
