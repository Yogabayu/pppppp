<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Portofolios;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Softskill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $profile = Profile::with('user')->where('id', 1)->first();
        $skills = Skill::where('user_uuid', $profile->user_uuid)->get();
        $edus = Education::where('user_uuid', $profile->user_uuid)->get();
        $works = Experience::where('user_uuid', $profile->user_uuid)->where('type', 1)->get();
        $apships = Experience::where('user_uuid', $profile->user_uuid)->where('type', 0)->get();
        $softskills = Softskill::where('user_uuid', $profile->user_uuid)->where('is_see', '!=', 0)->get();
        $projects = Portofolios::where('user_uuid', $profile->user_uuid)->where('status', '!=', 0)->get();
        // dd($skills);

        return view('welcome', compact('profile', 'skills', 'edus', 'works', 'apships', 'softskills', 'projects'));
    }
}
