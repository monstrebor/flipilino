<div class="ml-[60px] w-[1400px]">
    <div class="flex flex-col bg-gray-100 min-h-screen w-full gap-5 p-12">

        {{-- Friend Requests --}}
        <div class="bg-white shadow rounded-2xl p-4">
            <div class="flex items-center mb-3">
                <i data-lucide="user-plus" class="w-5 h-5 text-blue-600 mr-2"></i>
                <h2 class="text-lg font-semibold text-gray-800">Friend Requests</h2>
            </div>

            @forelse ($friendRequests as $request)
                <div class="flex items-center justify-between mb-3 border-b pb-3">
                    <div class="flex items-center space-x-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($request->sender->name) }}&background=random"
                            class="w-12 h-12 rounded-full" alt="{{ $request->sender->name }}">
                        <div>
                            <p class="font-medium text-gray-700">{{ $request->sender->name }}</p>
                            <small class="text-gray-500 text-xs">{{ $request->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <form action="{{ route('user.confirm-friend') }}" method="POST">
                            @csrf
                            <input type="hidden" name="friendship_id" value="{{ $request->id }}">
                            <button class="text-xs bg-blue-600 text-white px-3 py-1.5 rounded hover:bg-blue-700 transition">
                                Confirm
                            </button>
                        </form>
                        <button class="text-xs bg-gray-200 text-gray-700 px-3 py-1.5 rounded hover:bg-gray-300 transition">
                            Delete
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500 text-center py-2">No pending friend requests.</p>
            @endforelse
        </div>

        {{-- Friends List --}}
        <div class="bg-white shadow rounded-2xl p-4">
            <div class="flex items-center mb-3">
                <i data-lucide="users" class="w-5 h-5 text-green-600 mr-2"></i>
                <h2 class="text-lg font-semibold text-gray-800">Friends</h2>
            </div>

            @forelse ($friends as $friend)
                @php
                    $friendUser = $friend->sender_id === auth()->id() ? $friend->receiver : $friend->sender;
                @endphp

                <div class="flex items-center justify-between mb-3 border-b pb-3">
                    <div class="flex items-center space-x-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($friendUser->name) }}&background=random"
                            class="w-12 h-12 rounded-full" alt="{{ $friendUser->name }}">
                        <p class="font-medium text-gray-700">{{ $friendUser->name }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <button
                            class="text-xs bg-gray-200 text-gray-700 px-3 py-1.5 rounded hover:bg-gray-300 transition flex items-center gap-1">
                            <i data-lucide="message-square" class="w-4 h-4"></i> Message
                        </button>
                        <button
                            class="text-xs bg-red-100 text-red-600 px-3 py-1.5 rounded hover:bg-red-200 transition flex items-center gap-1">
                            <i data-lucide="user-x" class="w-4 h-4"></i> Unfriend
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500 text-center py-2">You have no friends yet.</p>
            @endforelse
        </div>

        {{-- Friend Suggestions --}}
        <div class="bg-white shadow rounded-2xl p-4 mb-6">
            <div class="flex items-center mb-3">
                <i data-lucide="user-search" class="w-5 h-5 text-purple-600 mr-2"></i>
                <h2 class="text-lg font-semibold text-gray-800">Friend Suggestions</h2>
            </div>

            @forelse ($suggestions as $user)
                <div class="flex items-center justify-between mb-3 border-b pb-3">
                    <div class="flex items-center space-x-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random"
                            class="w-12 h-12 rounded-full" alt="{{ $user->name }}">
                        <p class="font-medium text-gray-700">{{ $user->name }}</p>
                    </div>
                    <form action="{{ route('user.add-friend') }}" method="POST">
                        @csrf
                        <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                        <button
                            class="text-xs bg-blue-600 text-white px-3 py-1.5 rounded hover:bg-blue-700 transition flex items-center gap-1">
                            <i data-lucide="user-plus" class="w-4 h-4"></i> Add Friend
                        </button>
                    </form>
                </div>
            @empty
                <p class="text-sm text-gray-500 text-center py-2">No friend suggestions available.</p>
            @endforelse
        </div>

    </div>
</div>