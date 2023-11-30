<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $profile = Profile::with('user')->where('id',1)->first();
        // dd($profile);

        return view('welcome',compact('profile'));
    }
}
