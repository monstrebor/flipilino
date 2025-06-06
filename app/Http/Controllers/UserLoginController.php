<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginForm;
use App\Models\User;
use Illuminate\Http\{Request, RedirectResponse};
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function user_login(UserLoginForm $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            session()->regenerate();
            $user = Auth::user();

            // Force password change if it's the user's first login
            if ($user->is_new) {
                if ($user->hasRole('admin')) {
                    return redirect()->route('admin.password')->with('error', 'Please change your password.');
                }

                if ($user->hasRole('user')) {
                    return redirect()->route('user.password')->with('error', 'Please change your password.');
                }
            }

            // Redirect based on user role
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.home');
            }

            if ($user->hasRole('user')) {
                return redirect()->route('user.home');
            }

            // Optional: fallback for unassigned roles
            return redirect()->route('login')->with('error', 'Your account has no assigned role.');
        }

        // If login fails
        return back()->withErrors(['email' => 'Invalid credentials, please try again.']);
    }


    public function logout(): RedirectResponse
    {
        Auth::logout(); // Log out the user
        request()->session()->invalidate(); // Invalidate the session
        request()->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/'); // Redirect to login or any desired route
    }
}
