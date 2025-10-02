<!-- POST BOX (from your code) -->
<div class="bg-white shadow rounded-lg p-4 w-full">
    <div class="flex items-center space-x-3">
        <!-- Profile Image -->
        <img src="https://tse1.mm.bing.net/th/id/OIP.uxCC-VO5jt3QWKaHGH2m1wHaHP?rs=1&pid=ImgDetMain&o=7&rm=3" class="rounded-circle me-2 w-10 l-10" alt="Avatar">

        <!-- Post Input Button -->
        <button type="button"
            class="flex-1 text-left bg-gray-100 hover:bg-gray-200 text-gray-600 py-2 px-4 rounded-full"
            data-bs-toggle="modal" data-bs-target="#postModal">
            What's on your mind, {{ Auth::user()->name }}?
        </button>
    </div>

    <!-- Divider -->
    <div class="border-t my-3"></div>

    <!-- Action Buttons like FB -->
    <div class="flex justify-around text-gray-600 text-sm">
        <button class="flex items-center space-x-2 hover:bg-gray-100 px-3 py-2 rounded-lg w-full justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20"
                fill="currentColor">
                <path
                    d="M10 3.5a6.5 6.5 0 00-6.5 6.5c0 4.142 6.5 10.5 6.5 10.5s6.5-6.358 6.5-10.5A6.5 6.5 0 0010 3.5z" />
            </svg>
            <span>Live Video</span>
        </button>
        <button class="flex items-center space-x-2 hover:bg-gray-100 px-3 py-2 rounded-lg w-full justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5h2l1 9h13l1-9h2M5 21h14a2 2 0 002-2v-1H3v1a2 2 0 002 2z" />
            </svg>
            <span>Photo/Video</span>
        </button>
        <button class="flex items-center space-x-2 hover:bg-gray-100 px-3 py-2 rounded-lg w-full justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 10l4.553-4.553a1 1 0 00-1.414-1.414L13.586 8.586A2 2 0 0013 10h2z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 10v10a2 2 0 01-2 2H7a2 2 0 01-2-2V10h14z" />
            </svg>
            <span>Feeling/Activity</span>
        </button>
    </div>
</div>

<!-- Example feed posts -->
<div class="mt-4 space-y-4">
    <div class="bg-white shadow rounded-lg p-4">Sample Post 1</div>
    <div class="bg-white shadow rounded-lg p-4">Sample Post 2</div>
</div>