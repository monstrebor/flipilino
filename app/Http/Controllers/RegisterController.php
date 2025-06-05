<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterForm;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Mail};
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function registerUser(RegisterForm $request)
    {
        $validated = $request->validated();

        $password = str::random(6);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($password),
            'is_new' => true,
            'status' => 'active',
        ]);

        $role = $request->user_type === 'admin' ? 'admin' : 'user';
        $user->assignRole($role);

        $details = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $password,
        ];
        Mail::to($validated['email'])->send(new WelcomeEmail($details));

        session()->flash('success', 'Account created successfully! A welcome email has been sent.');

        if (!is_null($request->user_type)) {
            return redirect()->route('add-user');
        }
        return redirect()->route('login');
    }

    public function update(RegisterForm $request, $id)
    {
        $validated = $request->validated();

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->back()->with('success', 'User updated successfully!');
    }
}
