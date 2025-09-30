@extends('admin.layout.layout')

@section('title', 'Settings')

@section('script')
@endsection

@section('content')
    <div class="w-full h-full bg-gray-100 p-6">
        @include('admin.partials.navbar')
        {{-- Navbar & Sidebar --}}
        @include('admin.partials.sidebar')

        {{-- Settings Container --}}
        <div class="max-w-5xl mx-auto bg-white shadow-md rounded-2xl p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Settings</h1>

            {{-- Account Settings Section --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-3">Account</h2>
                <div class="space-y-3">
                    <a href="{{ route('admin.password') }}"
                        class="block w-full text-left bg-gray-50 hover:bg-gray-100 border rounded-lg px-4 py-3 shadow-sm transition">
                        <span class="font-medium text-gray-800">Change Password</span>
                        <p class="text-sm text-gray-500">Update your login credentials</p>
                    </a>
                </div>
            </div>

            {{-- System Settings Section --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-3">System</h2>
                <div class="space-y-3">
                    <button
                        class="w-full text-left bg-gray-50 hover:bg-gray-100 border rounded-lg px-4 py-3 shadow-sm transition">
                        <span class="font-medium text-gray-800">General Settings</span>
                        <p class="text-sm text-gray-500">Configure system preferences</p>
                    </button>
                    <button
                        class="w-full text-left bg-gray-50 hover:bg-gray-100 border rounded-lg px-4 py-3 shadow-sm transition">
                        <span class="font-medium text-gray-800">Notifications</span>
                        <p class="text-sm text-gray-500">Manage alerts and emails</p>
                    </button>
                </div>
            </div>

            {{-- Placeholder for Future Settings --}}
            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-3">More Settings</h2>
                <div class="space-y-3">
                    <button
                        class="w-full text-left bg-gray-50 hover:bg-gray-100 border rounded-lg px-4 py-3 shadow-sm transition">
                        <span class="font-medium text-gray-800">Coming Soon</span>
                        <p class="text-sm text-gray-500">Additional options will appear here</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
