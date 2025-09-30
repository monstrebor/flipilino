<div class="w-full bg-gradient-to-r from-slate-500 to-slate-700 h-[60px] shadow-lg ml-[40px]">
    <div class="flex justify-between items-center h-full px-6">
        <!-- Left: Logo -->
        <div class="flex items-center space-x-3">
            <img src="https://img.icons8.com/color/48/000000/shop.png" alt="Logo"
                class="w-10 h-10 rounded-full shadow-md">
            <span class="text-white font-extrabold text-xl tracking-wide">My Website</span>
        </div>

        <!-- Center: Navigation Links -->
        <div class="flex items-center space-x-6 text-white font-medium text-lg">
            <a href="#" class="hover:text-yellow-300 transition">Home</a>
            <a href="#" class="hover:text-yellow-300 transition">About Us</a>
            <a href="#" class="hover:text-yellow-300 transition">Contact</a>
        </div>

        <!-- Right: User/Actions -->
        <div class="flex items-center space-x-5 mr-[80px]">
            <!-- Profile avatar -->
            <img src="https://i.pravatar.cc/40?img=12" alt="User Avatar"
                class="w-10 h-10 rounded-full border-2 border-white shadow">

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