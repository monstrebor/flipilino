<div class="flex flex-col lg:flex-row gap-4 mt-6 max-w-6xl mx-auto px-4">
    @include('users.profile.edit-modal')
    {{-- LEFT SIDEBAR --}}
    <aside class="w-full lg:w-1/3">
        <div class="bg-white rounded-lg shadow-sm p-4">
            <h2 class="text-lg font-semibold mb-3 flex justify-between items-center">
                Intro
                @if (auth()->id() === $user->id)
                    <button onclick="document.getElementById('editIntroModal').classList.remove('hidden')"
                        class="text-sm text-blue-600 hover:underline">
                        Edit
                    </button>
                @endif
            </h2>

            <p class="text-gray-700 text-sm">{{ optional($user->profile)->bio ?? 'No bio yet.' }}</p>

            <div class="mt-3 space-y-2 text-sm text-gray-600">
                @if(optional($user->profile)->facebook_link)
                    <a href="{{ optional($user->profile)->facebook_link }}"
                        class="flex items-center gap-2 hover:text-blue-600"><i class="bi bi-facebook"></i> Facebook</a>
                @endif
                @if(optional($user->profile)->twitter_link)
                    <a href="{{ optional($user->profile)->twitter_link }}"
                        class="flex items-center gap-2 hover:text-sky-500"><i class="bi bi-twitter"></i> Twitter</a>
                @endif
                @if(optional($user->profile)->instagram_link)
                    <a href="{{ optional($user->profile)->instagram_link }}"
                        class="flex items-center gap-2 hover:text-pink-500"><i class="bi bi-instagram"></i> Instagram</a>
                @endif
                @if(optional($user->profile)->tiktok_link)
                    <a href="{{ optional($user->profile)->tiktok_link }}"
                        class="flex items-center gap-2 hover:text-gray-800"><i class="bi bi-tiktok"></i> TikTok</a>
                @endif
                @if(optional($user->profile)->github_link)
                    <a href="{{ optional($user->profile)->github_link }}"
                        class="flex items-center gap-2 hover:text-gray-800"><i class="bi bi-github"></i> GitHub</a>
                @endif
            </div>
        </div>
    </aside>

    {{-- MAIN POSTS --}}
    <main class="w-full lg:w-2/3">
        @include('users.post.center-feed')
    </main>
</div>