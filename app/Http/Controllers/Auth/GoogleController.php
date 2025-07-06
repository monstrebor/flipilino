<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Mail\WelcomeEmail;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
$googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $faker = Faker::create();
            $randomName = strtolower($faker->word) . ucfirst($faker->colorName). '_' . rand(000, 999);
            $randomPassword = Str::random(4);

            $user = User::create([
                'name' => $randomName,
                'email' => $googleUser->getEmail(),
                'password' => Hash::make($randomPassword),
                'is_new' => true,
                'status' => 'active',
            ]);

            $user->assignRole('user');

            Mail::to($user->email)->send(new WelcomeEmail([
                'name' => $randomName,
                'email' => $user->email,
                'password' => $randomPassword,
            ]));
        }

        auth()->login($user);
        return redirect()->route('home')->with('success', 'Logged in with Google!');
    }
}

