@extends('admin.layout.layout')

@section('title', 'Login Page')

@section('script')

@endsection

@section('content')
    @include('admin.partials.navbar')
    <div class="w-full h-full ml-10">
        @include('admin.partials.sidebar')
        @include('admin.layout.all_notif')
        <H1>Welcome!!</H1>

        @if (auth()->user()->is_new == true)
            <div class="offset-3 col-6 mt-4">
                <livewire:settings.change-password>
            </div>
        @endif
    </div>
@endsection