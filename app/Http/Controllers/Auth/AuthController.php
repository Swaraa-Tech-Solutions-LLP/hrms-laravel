<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard'); // or wherever
            }

            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Something went wrong');

        }
    }
}
