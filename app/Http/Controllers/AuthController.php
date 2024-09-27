<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('name','password'))){
                return redirect('/dashboard');
        }

        return redirect('/login')->with('gagal', 'Username atau Password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

    
}