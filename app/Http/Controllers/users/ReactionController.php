<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Reaction, PostImage};
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|integer',
            'type' => 'required|string',
        ]);

        $userId = Auth::id();

        $existing = Reaction::where('post_image_id', $request->post_id)
            ->where('user_id', $userId)
            ->first();

        if ($existing && $existing->type === $request->type) {
            $existing->delete();
        } else {
            Reaction::updateOrCreate(
                ['post_image_id' => $request->post_id, 'user_id' => $userId],
                ['type' => $request->type]
            );
        }

        return back();
    }
}
