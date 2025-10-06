<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\{Friendship,User};
use Illuminate\Http\Request;

class FriendshipController extends Controller
{
    public function index()
    {
        // Fetch friend requests (pending)
        $friendRequests = Friendship::where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->with('sender')
            ->latest()
            ->get();

        $friends = Friendship::where(function ($query) {
            $query->where('sender_id', auth()->id())
                ->orWhere('receiver_id', auth()->id());
        })
            ->where('status', 'accepted')
            ->with(['sender', 'receiver'])
            ->latest()
            ->get();

        $suggestions = User::role('user')
            ->where('id', '!=', auth()->id())
            ->whereDoesntHave('sentFriendships', function ($query) {
                $query->where('receiver_id', auth()->id());
            })
            ->whereDoesntHave('receivedFriendships', function ($query) {
                $query->where('sender_id', auth()->id());
            })
            ->take(5)
            ->get();

        return view('users.friends.index', compact('friendRequests', 'friends', 'suggestions'));
    }

    public function addFriend(Request $request)
    {
        $receiverId = $request->input('receiver_id');
        $senderId = auth()->id();

        if ($senderId == $receiverId) {
            return back()->with('error', 'You cannot add yourself.');
        }

        $exists = Friendship::where(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $senderId)
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', $senderId);
        })->exists();

        if ($exists) {
            return back()->with('info', 'Friend request already sent or you are already friends.');
        }

        Friendship::create([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Friend request sent!');
    }

    public function confirmFriend(Request $request)
    {
        $friendshipId = $request->input('friendship_id');

        $friendship = Friendship::where('id', $friendshipId)
            ->where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->first();

        if (!$friendship) {
            return back()->with('error', 'Friend request not found or already handled.');
        }

        $friendship->update(['status' => 'accepted']);

        return back()->with('success', 'Friend request accepted!');
    }
}
