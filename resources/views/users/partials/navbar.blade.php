<div class="w-full bg-gradient-to-r from-slate-500 to-slate-700 h-[60px] shadow-lg">
    <div class="flex justify-between items-center h-full px-6">
        <!-- Left: Logo -->
        <div class="flex items-center space-x-3 ml-[40px]">
            <img src="https://img.icons8.com/color/48/000000/shop.png" alt="Logo"
                class="w-10 h-10 rounded-full shadow-md">
            <span class="text-white font-extrabold text-xl tracking-wide">My Website</span>
        </div>

        <!-- Center: Facebook-style Navigation Icons -->
        <div class="flex items-center space-x-12 text-gray-400">
            <!-- Home (Active) -->
            <a href="{{ route('user.dashboard') }}"
                class="relative flex items-center justify-center px-6 py-2 rounded-lg hover:bg-gray-400 hover:text-blue-500 transition">
                <i data-lucide="home" class="w-7 h-7 text-white"></i>
            </a>

            <!-- Pages -->
            <a href="#"
                class="relative flex items-center justify-center px-6 py-2 rounded-lg hover:bg-gray-400 hover:text-blue-500 transition">
                <i data-lucide="layout-dashboard" class="w-7 h-7 text-white"></i>
            </a>

            <!-- Friends -->
            <a href="{{ route('user.view-friend') }}"
                class="relative flex items-center justify-center px-6 py-2 rounded-lg hover:bg-gray-400 hover:text-blue-500 transition">
                <i data-lucide="users" class="w-7 h-7 text-white"></i>
            </a>

            <!-- Watch -->
            <a href="#"
                class="relative flex items-center justify-center px-6 py-2 rounded-lg hover:bg-gray-400 hover:text-blue-500 transition">
                <i data-lucide="tv" class="w-7 h-7 text-white"></i>
            </a>

            <!-- Menu -->
            <a href="#"
                class="relative flex items-center justify-center px-6 py-2 rounded-lg hover:bg-gray-400 hover:text-blue-500 transition">
                <i data-lucide="menu" class="w-7 h-7 text-white"></i>
            </a>
        </div>

        <!-- Right: User/Actions -->
        <div class="flex items-center space-x-5 mr-[40px]">
            <!-- Profile avatar -->
            <x-user-avatar />

            <!-- Logout button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg shadow-md transition">
                    <i class="material-icons mr-1">logout</i>
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>