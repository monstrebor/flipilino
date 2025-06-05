<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserLogin extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:5',
    ];


    public function loginUser()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            $userId = Auth::user()->id;
            $user = User::find($userId);
            if($user->is_new == true){
                return redirect()->route('admin.password')->with('error','please change your password');
            }

            return redirect()->route('admin.home');
        } else {
            $this->addError('email', 'Invalid credentials, please try again.');
        }
    }

    public function render()
    {
        return view('livewire.user-login');
    }
}
