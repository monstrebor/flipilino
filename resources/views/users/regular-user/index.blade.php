@extends('users.regular-user.layout.layout')

@section('title', 'Home')

@section('script')
    <script src="{{ asset('js/togglePass.js') }}" defer></script>

@endsection

@section('content')
<div class="w-full h-full">
    @include('users.regular-user.partials.navbar')
    @include('users.regular-user.partials.sidebar')
    @if(Auth::user()->is_new === 0)
    @include('users.regular-user.home')
    @else
    <div>
        <h1 class="text-red-500 text-2xl text-center">Please change password!!</h1>
        <div class="offset-3 col-6 mt-4">
            <livewire:settings.change-password>
        </div>
    </div>
    @endif
    @include('users.regular-user.partials.rightpane')

</div>
@endsection