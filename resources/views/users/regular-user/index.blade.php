@extends('users.regular-user.layout.layout')

@section('title', 'Home')

@section('script')

@endsection

@section('content')
    <div class="w-full h-full">
        @include('users.regular-user.partials.navbar')
        @include('users.regular-user.partials.sidebar')
        @include('users.regular-user.home')
        @include('users.regular-user.partials.rightpane')

    </div>
@endsection
