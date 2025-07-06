<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegisterForm;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Mail};
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
        public function update(RegisterForm $request, $id)
    {
        $validated = $request->validated();

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->back()->with('success', 'User updated successfully!');
    }
}
