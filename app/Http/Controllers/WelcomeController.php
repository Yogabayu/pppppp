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
        
        if(!empty($profile)){
            $skills = Skill::where('user_uuid',$profile->user_uuid)->get();
            return view('welcome',compact('profile','skills'));
        } else {
            return redirect()->route('admin-login')->with('error','silahkan melakukan update data terlebih dahulu');
        }

    }
}
