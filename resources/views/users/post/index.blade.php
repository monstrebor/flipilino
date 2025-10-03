<div class="ml-[60px]">
    @include('users.post.post-modal')
    <div class="flex bg-gray-100 min-h-screen w-full gap-5">
        <!-- LEFT SIDEBAR -->
        <aside class="w-72 p-4 hidden md:block">
            @include('users.post.left-sidebar')
        </aside>

        <!-- CENTER FEED -->
        <main class="flex-1 px-2.5 max-w-2xl">
            @include('layout.all_notif')
            @include('users.post.center-feed')
        </main>

        <!-- RIGHT SIDEBAR -->
        <aside class="w-72 p-4 hidden lg:block">
            @include('users.post.right-sidebar')
        </aside>
    </div>

</div>