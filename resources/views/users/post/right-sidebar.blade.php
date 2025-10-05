<div class="bg-white shadow rounded-lg p-3 mb-4">
    <h3 class="font-semibold text-gray-700 mb-2">Sponsored</h3>
    <img src="https://via.placeholder.com/200x100" class="rounded-lg mb-2">
    <p class="text-sm text-gray-600">Ad content...</p>
</div>
<div class="bg-white shadow rounded-lg p-3">
    <h3 class="font-semibold text-gray-700 mb-2">Contacts</h3>
    <ul class="space-y-2 text-sm">
        <li class="flex items-center space-x-2">
            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
            <span>Friend 1</span>
        </li>
        <li class="flex items-center space-x-2">
            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
            <span>Friend 2</span>
        </li>
    </ul>
</div>
<div class="bg-white shadow rounded-lg p-2 mt-4">
    <h3 class="font-semibold text-gray-700 mb-2">Friend Requests</h3>
    @forelse($friendRequests as $request)
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center space-x-2">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($request->sender->name) }}&background=random"
                    class="w-8 h-8 rounded-full" alt="{{ $request->sender->name }}">
                <div class="flex flex-col">
                    <span class="text-sm font-medium text-gray-700">{{ $request->sender->name }}</span>
                    <small class="text-xs text-gray-500">
                        Sent {{ $request->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
            <form action="{{ route('user.confirm-friend') }}" method="POST">
                @csrf
                <input type="hidden" name="friendship_id" value="{{ $request->id }}">
                <button class="text-xs bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700 transition">
                    Confirm
                </button>
            </form>
        </div>
    @empty
        <p class="text-sm text-gray-500">No friend requests available.</p>
    @endforelse
</div>
<div class="bg-white shadow rounded-lg p-2 mt-4">
    <h3 class="font-semibold text-gray-700 mb-2">Friend Suggestions</h3>
    @forelse($users as $user)
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center space-x-2">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random"
                    class="w-8 h-8 rounded-full" alt="{{ $user->name }}">
                <span class="text-sm font-medium text-gray-700">{{ $user->name }}</span>
            </div>
            <form action="{{ route('user.add-friend') }}" method="POST">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                <button class="text-xs bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700 transition">
                    Add Friend
                </button>
            </form>
        </div>
    @empty
        <p class="text-sm text-gray-500">No suggestions available.</p>
    @endforelse
</div>