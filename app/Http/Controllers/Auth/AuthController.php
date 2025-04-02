<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showSignUpForm()
    {
        return view('auth.signup_page');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login_page')->with('success', 'Logged out successfully.');
    }


    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::loginUsingId(User::where('email', $request->email)->first()->id);

        return redirect()->route('students.index')->with('success', 'Registration successful');
    }
    public function login(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt login using the provided credentials
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('students.index'); // Redirect to the home page after successful login
        } else {
            return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
        }
    }
}
