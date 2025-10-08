<ul class="space-y-4 text-gray-700">
    <li class="flex items-center space-x-2">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random"
         class="rounded-full me-2 w-11 l-11">
        <span>{{ Auth::user()->name }}</span>
    </li>
    <li class="flex items-center space-x-2">
        <span>🏠</span>
        <span>Home</span>
    </li>
    <li class="flex items-center space-x-2">
        <span>👥</span>
        <span>Friends</span>
    </li>
    <li class="flex items-center space-x-2">
        <span>🎥</span>
        <span>Watch</span>
    </li>
    <li class="flex items-center space-x-2">
        <span>🛒</span>
        <span>Marketplace</span>
    </li>
</ul>