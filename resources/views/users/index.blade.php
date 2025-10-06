@extends('users.layout.layout')

@section('title', 'Home')

@section('script')
    <link rel="stylesheet" href="{{ asset('css/reactions.css') }}">
@endsection

@section('content')
    <div class="w-full h-full">
        @include('users.partials.navbar')
        @include('users.partials.sidebar')
        @include('users.post.index')
        @include('users.partials.rightpane')
    </div>
@endsection