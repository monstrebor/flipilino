<div class="bg-gray-100 w-[1100px] mt-2">
    @include('layout.all_notif')

    {{-- COVER SECTION --}}
    <div class="relative bg-white shadow-sm">
        <img src="{{ optional($user->profile)->cover_photo
    ? asset('storage/' . $user->profile->cover_photo)
    : 'https://images.pexels.com/photos/1629236/pexels-photo-1629236.jpeg?_gl=1*ca3ldy*_ga*MTc0ODYxMTE1NC4xNzU5OTE1MjA2*_ga_8JE65Q40S6*czE3NTk5MTUyMDYkbzEkZzEkdDE3NTk5MTUyNTIkajE0JGwwJGgwo' }}"
            class="w-full h-[380px] md:h-[400px] object-cover rounded-b-lg" alt="Cover Photo">

        @if (auth()->id() === $user->id)
            <form action="{{ route('user.cover-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <label for="cover_photo"
                    class="absolute bottom-3 right-3 z-10 bg-white/90 hover:bg-white text-gray-700 text-sm font-medium px-3 py-1.5 rounded-md cursor-pointer shadow-sm flex items-center gap-1">
                    <i class="bi bi-camera"></i> Edit Cover Photo
                </label>

                <input type="file" id="cover_photo" name="cover_photo" class="hidden" accept="image/*"
                    onchange="this.form.submit()">
            </form>
        @endif
    </div>

    {{-- PROFILE HEADER --}}
    <div class="bg-white shadow-sm rounded-b-lg px-4 md:px-8 pb-4 -mt-16 md:-mt-20 relative">
        <div class="flex flex-col md:flex-row items-center md:items-end justify-between">
            <div class="relative flex flex-col md:flex-row items-center md:items-end gap-4 md:gap-6 -mt-20 px-4">
                {{-- Profile Picture --}}
                <div class="relative">
                    <img id="profile-preview" src="{{ optional($user->profile)->profile_picture
    ? asset('storage/' . $user->profile->profile_picture)
    : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}" alt="Profile Picture"
                        class="w-36 h-36 md:w-44 md:h-44 rounded-full border-4 border-white shadow-md object-cover">

                    {{-- Edit Profile Picture --}}
                    @if (auth()->id() === $user->id)
                        <form action="{{ route('user.profile-update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <label for="profile_picture"
                                class="absolute bottom-2 right-2 w-12 h-12 bg-white hover:bg-gray-100 text-gray-700 rounded-full p-2 cursor-pointer shadow-md flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-10 h-10 text-gray-700">
                                    <path
                                        d="M4 6h3l1-2h8l1 2h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2zm8 3a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 8a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                </svg>
                            </label>
                            <input type="file" id="profile_picture" name="profile_picture" class="hidden" accept="image/*"
                                onchange="this.form.submit()">
                        </form>
                    @endif
                </div>

                {{-- Name + Bio --}}
                <div class="text-center md:text-left mt-3 md:mt-0">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                    <p class="text-gray-600 text-sm md:text-base">
                        {{ optional($user->profile)->bio ?? 'Add a short bio...' }}
                    </p>
                </div>
            </div>
        </div>

        {{-- NAV TABS --}}
        <div class="mt-6 border-t pt-3 flex justify-evenly md:justify-start md:gap-8 text-sm font-medium text-gray-600">
            <a href="#" class="text-blue-600 border-b-2 border-blue-600 pb-2">Posts</a>
            <a href="#" class="hover:text-blue-600 pb-2">About</a>
            <a href="#" class="hover:text-blue-600 pb-2">Friends</a>
            <a href="#" class="hover:text-blue-600 pb-2">Photos</a>
            <a href="#" class="hover:text-blue-600 pb-2">More</a>
        </div>
    </div>

    {{-- PROFILE BODY --}}
    @include('users.profile.body')
</div>