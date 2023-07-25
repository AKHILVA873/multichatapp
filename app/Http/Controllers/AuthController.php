<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

// Include the necessary classes at the top of the file

class AuthController extends Controller
{
    // Method to show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Method to handle user registration
    public function register(Request $request)
    {
        // Validation logic for registration data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create and save the new user
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();

        // Redirect the user to the dashboard
        return redirect('/dashboard');
    }

    // Method to show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Method to handle user login
    public function login(Request $request)
    {
        // Validation logic for login data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to dashboard
            return redirect('/dashboard');
        } else {
            // Authentication failed, redirect back to login page with error message
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    // Method to handle user logout
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
