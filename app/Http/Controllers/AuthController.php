<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Str;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function registration()
    {
        return view('registration');
    }
    public function registration_post(Request $request)
    {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6'
        ]);
        $user  = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->photo = '';
        $user->birth_date = null;
        $user->save();
        return redirect('login')->with('success', 'Register Success');
    }
    public function login_post(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Login Success');
        }
        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);;
    }
    public function login()
    {

        return view('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
