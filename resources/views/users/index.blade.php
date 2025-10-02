@extends('users.layout.layout')

@section('title', 'Home')

@section('script')

@endsection

@section('content')
    <div class="w-full h-full">
        @include('users.partials.navbar')
        @include('users.partials.sidebar')
        @include('users.post.index')
        @include('users.partials.rightpane')

        @if (auth()->user()->is_new == true)
            <div class="offset-3 col-6 mt-4">
                <livewire:settings.change-password>
            </div>
        @endif
    </div>
@endsection