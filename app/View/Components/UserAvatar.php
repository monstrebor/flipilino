<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class UserAvatar extends Component
{
    public $user;
    /**
     * Create a new component instance.
     */
    public function __construct($user = null)
    {
        $this->user = $user ?? auth()->user();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-avatar');
    }
}
