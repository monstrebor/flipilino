@extends('Admin.layout.layout')

@section('title', 'Login Page')

@section('script')

@endsection

@section('content')
    <div class="w-full h-full">
        @include('Admin.partials.navbar')
        @include('Admin.partials.sidebar')
        <div class="offset-3 col-6 mt-4">
            <livewire:settings.change-password>
        </div>

    </div>
@endsection

