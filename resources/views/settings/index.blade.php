@extends('admin.layout.layout')

@section('title', 'Login Page')

@section('script')

@endsection

@section('content')
    <div class="w-full h-full">
        @include('admin.partials.navbar')
        @include('admin.partials.sidebar')

        <a href="{{route('admin.password')}}">
            <button>
                <h1>Change Password</h1>
            </button>
        </a>

    </div>
@endsection
