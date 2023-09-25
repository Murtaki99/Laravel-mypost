<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index', [
            "title" => "Login"
        ]);
    }

    public function register()
    {
        return view('auth.register', [
            "title" => "Registration"
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:4|max:8|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:10'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect('/login')->withSuccess('Registration succesfully');
    }

    public function authenticate(Request $request)
    {
        $credenstials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credenstials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->withToastSuccess('Login Successfully!');;
        }

        return back()->with('toast_warning', 'Authentication Failed !');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
