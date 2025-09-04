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

            if ($user->is_new) {
                return redirect()->route('admin.password')->with('error', 'Please change your password.');
            }

            // Check user role using Spatie
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.home');
            } elseif ($user->hasRole('user')) {
                return redirect()->route('user.home');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Unauthorized role.']);
            }
        }
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
