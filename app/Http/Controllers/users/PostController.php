<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\{Post, User, Friendship};
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user', 'images')->latest()->get();

        $authId = auth()->id();

        $friendIds = Friendship::where(function ($query) use ($authId) {
            $query->where('sender_id', $authId)
                ->orWhere('receiver_id', $authId);
        })
            ->pluck('sender_id', 'receiver_id')
            ->flatten()
            ->unique()
            ->toArray();

        $pendingIds = Friendship::where(function ($query) use ($authId) {
            $query->where('sender_id', $authId)
                ->orWhere('receiver_id', $authId);
        })
            ->where('status', 'pending')
            ->pluck('sender_id', 'receiver_id')
            ->flatten()
            ->unique()
            ->toArray();

        $excludeIds = array_unique(array_merge([$authId], $friendIds, $pendingIds));

        $users = User::role(['user', 'user_vip'])
            ->whereNotIn('id', $excludeIds)
            ->get();

        $friendRequests = Friendship::where('receiver_id', $authId)
            ->where('status', 'pending')
            ->with('sender')
            ->latest()
            ->get();

        return view('users.index', compact('posts', 'users', 'friendRequests'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'post_text' => 'nullable|string',
            'post_images' => 'nullable',
            'post_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
        // Create the post first
        $post = Post::create([
            'posted_by' => auth()->id(),
            'post_text' => $request->post_text,
        ]);

        // Handle multiple image uploads
        if ($request->hasFile('post_images')) {
            foreach ($request->file('post_images') as $image) {
                // Generate a unique filename
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();

                // Store in storage/app/public/posts
                $path = $image->storeAs('posts', $filename, 'public');

                // Save to post_images table via relationship
                $post->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Post created successfully!');
    }
}