@extends('layout.layout')

@section('title', 'Flipilino')

@section('script')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
@endsection

@section('content')
<div class="w-full h-full">
    {{-- @include('partials.navbar') --}}
    <div class="flex min-h-screen">
        <div
            class="w-1/2 bg-gradient-to-br from-blue-100 to-indigo-700 text-white flex flex-col items-center justify-center p-6">
            <h1 class="text-8xl font-bolder mb-4 text-center" style="font-family: 'Montserrat', sans-serif;"><i
                    class="fas fa-comments text-8xl"></i>Make People Interact!</h1>
            <p class="text-2xl" style="font-family: 'Open Sans', sans-serif;">Connect, engage, and share meaningful
                conversations.</p>
        </div>

        <div class="w-1/2 bg-gradient-to-tr from-indigo-700 to-blue-100 text-white flex flex-col items-center justify-center p-6">
            @include('layout.all_notif')
            <fieldset class="flex justify-center items-center">
                <form id="login-form" class="w-full max-w-md" action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <h2 class="text-3xl font-bold mb-6 text-center">Login</h2>
                    <input type="email" placeholder="Email" name="email"
                        class="text-black w-full p-4 mb-4 border border-gray-300 rounded" />
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <input type="password" placeholder="Password" name="password"
                        class="text-black w-full p-4 mb-4 border border-gray-300 rounded" />
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded mb-4">Login</button>
                    <p class="text-center">
                        Don't have an account? <a href="#" onclick="toggleForms()" class="text-blue-600">Create an account</a>
                    </p>
                </form>

                <form id="register-form" class="w-full max-w-md hidden" method="POST"
                    action="{{ route('register.store') }}">
                    @csrf
                    <h2 class="text-3xl font-bold mb-6 text-center">Register</h2>

                    <input type="text" name="name" placeholder="Think of anonymous name..."
                        class="text-black w-full p-4 mb-4 border border-gray-300 rounded" value="{{ old('name') }}"
                        required>
                    @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <input type="email" name="email" placeholder="Email, to whom may I send your password?"
                        class="text-black w-full  p-4 mb-4 border border-gray-300 rounded" value="{{ old('email') }}"
                        required>
                    @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <!-- Register Button -->
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded mb-4">Register</button>
                    <p class="text-center">
                        Already have an account? <a href="#" onclick="toggleForms()" class="text-blue-600">Login</a>
                    </p>
                </form>

            </fieldset>

        </div>
    </div>
</div>

@endsection
