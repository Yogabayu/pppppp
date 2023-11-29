<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // Alert::toast('Berhasil Masuk', 'success');
                return redirect()->route('a-index')->with('success', 'Sukses masuk');
            } else {
                // Alert::toast('Email atau Password salah', 'error');
                return redirect()->back()->with('error', 'Email atau Password salah');
            }
        } catch (\Exception $e) {
            // Alert::toast('Error undefined', 'error');
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
