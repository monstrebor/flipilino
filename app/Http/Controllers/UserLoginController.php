<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginForm;
use Illuminate\Http\{Request, RedirectResponse};
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function user_login(UserLoginForm $request)
    {
        $loginField = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (Auth::attempt([$loginField => $request->input('login'), 'password' => $request->input('password')])) {
            session()->regenerate();
            $user = Auth::user();

            if ($user->is_new == true) {
                return redirect()->route('admin.password')->with('error', 'Please change your password.');
            }

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->withErrors(['login' => 'Invalid credentials, please try again.']);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout(); // Log out the user
        request()->session()->invalidate(); // Invalidate the session
        request()->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/'); // Redirect to login or any desired route
    }
}
