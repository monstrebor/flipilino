@extends('users.layout.layout')

@section('title', 'Profile')

@section('script')
    <link rel="stylesheet" href="{{ asset('css/reactions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection

@section('content')
    <div class="w-full h-full">
        @include('users.partials.navbar')
        @include('users.partials.sidebar')
        <div class="flex bg-gray-100 min-h-screen w-full justify-center">
            @include('users.post.post-modal')
            @include('users.profile.main')
        </div>
        @include('users.partials.rightpane')
    </div>

    <script>
        document.getElementById('profile_picture').addEventListener('change', function (e) {
            const [file] = e.target.files;
            if (file) document.getElementById('profile-preview').src = URL.createObjectURL(file);
        });

        document.getElementById('cover_photo').addEventListener('change', function (e) {
            const [file] = e.target.files;
            if (file) document.getElementById('cover-preview').src = URL.createObjectURL(file);
        });
    </script>
@endsection