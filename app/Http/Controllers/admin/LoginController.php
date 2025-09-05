<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, RedirectResponse};
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            session()->forget('url.intended');
            $user = Auth::user();
            if ($user->status === 'inactive'){
                Auth::logout();
                return back()->with('error','Your account is currently inactive!');
            }
            $role = $user->getRoleNames()->first();

            switch($role){
                case 'admin':
                    return redirect()->route('admin.dashboard')->with('login successfully');
                case 'user':
                    return redirect()->route('user.dashboard')->with('login successfully');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error','Login failed!');
            }
        }
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
