<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth as FacadeAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Get the login data
        $username = $request->input('username');
        $password = $request->input('password');

        // Find the user with the given credentials
        $user = Auth::where('username', $username)->first();

        // Check if the user exists and the password matches
        if ($user && Hash::check($password, $user->password)) {
            // Log the user in
            FacadeAuth::login($user);

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('kantinwks.index')->with('success', 'Login berhasil');
            } else if ($user->role === 'user') {
                return redirect()->route('pembeli.index')->with('success', 'Login berhasil');
            }

            // Default redirect
            return redirect()->route('dashboard')->with('success', 'Login berhasil');
        } else {
            // Redirect back with an error message
            return redirect()->route('login')->with('error', 'Username atau password salah');
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:auths',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                        ->withErrors($validator)
                        ->withInput();
        }

        Auth::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Make sure the role is passed in the registration form
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
