<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\{User, Friendship, Post, UserProfile};
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $authId = $user->id;

        $friendships = Friendship::where(
            fn($q) =>
            $q->where('sender_id', $authId)
                ->orWhere('receiver_id', $authId)
        )->get();

        $relatedIds = $friendships->pluck('sender_id')
            ->merge($friendships->pluck('receiver_id'))
            ->unique()
            ->values()
            ->all();

        $friendIds = $friendships->where('status', 'accepted')
            ->map(fn($f) => $f->sender_id === $authId ? $f->receiver_id : $f->sender_id)
            ->unique()
            ->values()
            ->all();

        $friendRequests = $friendships
            ->where('receiver_id', $authId)
            ->where('status', 'pending');

        $excludeIds = array_unique(array_merge([$authId], $relatedIds, $friendIds));

        $suggestions = User::role(['user', 'user_vip'])
            ->whereNotIn('id', $excludeIds)
            ->inRandomOrder()
            ->take(5)
            ->get();

        $visibleUserIds = array_merge([$authId], $friendIds);

        $posts = Post::with('user', 'images')
            ->whereIn('posted_by', $visibleUserIds)
            ->latest()
            ->get();

        return view('users.profile.index', compact('user', 'friendRequests', 'suggestions', 'posts'));
    }

    public function updateCover(Request $request)
    {
        $user = auth()->user();
        $profile = $user->profile ?? new UserProfile(['user_id' => $user->id]);

        if ($profile->cover_photo && Storage::disk('public')->exists($profile->cover_photo)) {
            Storage::disk('public')->delete($profile->cover_photo);
        }

        $path = $request->file('cover_photo')->store('images', 'public');
        $profile->cover_photo = $path;

        $profile->save();

        return back()->with('success', 'Cover photo updated successfully.');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $profile = $user->profile ?? new UserProfile(['user_id' => $user->id]);

        if ($request->hasFile('profile_picture')) {
            if ($profile->profile_picture && Storage::disk('public')->exists($profile->profile_picture)) {
                Storage::disk('public')->delete($profile->profile_picture);
            }

            $path = $request->file('profile_picture')->store('images', 'public');
            $profile->profile_picture = $path;
            $profile->save();
        }

        return back()->with('success', 'Profile picture updated successfully.');
    }

    public function updateIntro(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'bio' => 'nullable|string|max:255',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'tiktok_link' => 'nullable|url',
            'github_link' => 'nullable|url',
        ]);

        $profile = $user->profile ?? new UserProfile(['user_id' => $user->id]);
        $profile->fill($data)->save();

        return back()->with('success', 'Intro updated successfully!');
    }

    public function show($id = null)
    {
        $authUser = auth()->user();

        $user = $id ? User::with('profile')->findOrFail($id) : $authUser;

        $authId = $authUser->id;

        $friendships = Friendship::where(
            fn($q) =>
            $q->where('sender_id', $authId)->orWhere('receiver_id', $authId)
        )->get();

        $relatedIds = $friendships->pluck('sender_id')->merge($friendships->pluck('receiver_id'))->unique()->values()->all();
        $friendIds = $friendships->where('status', 'accepted')
            ->map(fn($f) => $f->sender_id === $authId ? $f->receiver_id : $f->sender_id)
            ->unique()->values()->all();

        $visibleUserIds = array_merge([$authId], $friendIds);

        $canSeePosts = $user->id === $authId || in_array($user->id, $friendIds);

        $posts = $canSeePosts
            ? Post::with('user', 'images')->where('posted_by', $user->id)->latest()->get()
            : collect();

        return view('users.profile.index', compact('user', 'posts', 'authUser', 'canSeePosts'));
    }
}
