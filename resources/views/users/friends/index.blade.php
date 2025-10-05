@extends('users.layout.layout')

@section('title', 'Home')

@section('script')

@endsection

@section('content')
    <div class="w-full h-full">
        @include('users.partials.navbar')
        @include('users.partials.sidebar')
        @include('users.friends.main')
        @include('users.partials.rightpane')
    </div>
@endsection