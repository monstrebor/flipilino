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

            if ($user->is_new == true) {
                return redirect()->route('admin.password')->with('error', 'Please change your password.');
            }

            return redirect()->route('admin.home');
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
