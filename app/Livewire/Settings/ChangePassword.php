<?php

namespace App\Livewire\Settings;

use Illuminate\Support\Facades\{Auth,Hash};
use Livewire\Attributes\Rule;
use Livewire\Component;

class ChangePassword extends Component
{
    public $old_password, $new_password;

    protected $rules = [
        'old_password' => 'required',
        'new_password' => 'required|min:8',
    ];

    public function change_password()
    {
        // Validate input
        $this->validate(); // ✅ Correct way to validate

        $user = \App\Models\User::find(Auth::id());

        if (Hash::check($this->old_password, $user->password)) {
            $user->password = Hash::make($this->new_password);
            $user->is_new = false;
            $user->save();
            session()->flash('success', 'Your password has been updated successfully.');
            return;
        }

        session()->flash('error', 'The old password did not match. Please try again.');
    }

    public function render()
    {
        return view('livewire.settings.change-password');
    }
}
