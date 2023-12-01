<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $profile = Profile::with('user')->where('id',1)->first();
        $skills = Skill::where('user_uuid',$profile->user_uuid)->get();
        // dd($skills);

        return view('welcome',compact('profile','skills'));
    }
}
