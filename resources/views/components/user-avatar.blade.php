<div>
    <!-- Well begun is half done. - Aristotle -->

    @php
        $profilePicture = optional($user?->profile)->profile_picture
            ? asset('storage/' . $user->profile->profile_picture)
            : 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'Guest') . '&background=random';
    @endphp

    <a href="{{ route('user.profile-view', ['id' => $user->id]) }}">
        <img src="{{ $profilePicture }}" class="w-11 h-11 rounded-full border-2 border-white shadow"
            alt="{{ $user->name ?? 'Guest' }}">
    </a>
</div>