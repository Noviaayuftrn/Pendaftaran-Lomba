<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(){
        return view('Auth.loginpanitia');
    }

    public function loginto(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns', 
            'password' => 'required']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Login gagal!');
    }

    public function loginDashboard()
    {
        $topics = Topic::all();
        return view('panitia.dashboard', compact('topics'));
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
