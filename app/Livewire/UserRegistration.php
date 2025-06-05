<?php

namespace App\Livewire;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Support\Facades\{Hash, Mail};
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserRegistration extends Component
{
    #[Rule('required|min:5')]
    public $name;

    #[Rule('required|email|unique:users,email')]
    public $email;

    public function registerUser()
    {
        $this->validate();
        $password = Str::random(6);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($password),
            'is_new' => true,
            'status' => 'active',
        ]);

        $details = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $password,
        ];
        Mail::to($this->email)->send(new WelcomeEmail($details));

        session()->flash('success', 'Account created successfully! A welcome email has been sent.');

        return redirect()->route('register.user');
    }


    public function render()
    {
        return view('livewire.user-registration');
    }
}
