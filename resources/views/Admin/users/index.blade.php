@extends('Admin.layout.layout')

@section('title', 'Add User Page')

@section('script')

@endsection

@section('content')
<div class="w-full h-full">
    @include('Admin.partials.navbar')
    @include('Admin.partials.sidebar')

    <div class="container my-5">
        <div class="border rounded shadow-lg p-4">
            @include('layout.all_notif')
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">User Table</h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">
                    <i class="fas fa-plus"></i> add user
                </button>
            </div>

            <table class="min-w-full text-sm text-center border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border">#</th>
                        <th class="py-2 px-4 border">Name</th>
                        <th class="py-2 px-4 border">Email</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="py-2 px-4 border">{{ $user->id }}</td>
                        <td class="py-2 px-4 border">{{ $user->name }}</td>
                        <td class="py-2 px-4 border">{{ $user->email }}</td>
                        <td class="py-2 px-4 border">
                            <button class="btn btn-primary editBtn" data-id="{{ $user->id }}"
                                data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-bs-toggle="modal"
                                data-bs-target="#editModal">
                                Edit
                            </button>

                            <form action="">
                                <button>Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content bg-gradient-to-tr from-indigo-700 to-blue-100 text-white">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-white" id="registerModalLabel">Register User</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('layout.all_notif')
                    <form id="register-form" method="POST" action="{{ route('store-user') }}">
                        @csrf
                        <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>

                        <select class="text-black w-full p-3 mb-3 border border-gray-300 rounded" name="user_type"
                            id="">
                            <option value="" selected>choose role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>

                        <input type="text" name="name" placeholder="Think of anonymous name..."
                            class="text-black w-full p-3 mb-3 border border-gray-300 rounded" value="{{ old('name') }}"
                            required>
                        @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <input type="email" name="email" placeholder="Email, to whom may I send your password?"
                            class="text-black w-full p-3 mb-3 border border-gray-300 rounded" value="{{ old('email') }}"
                            required>
                        @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editForm" class="modal-content" method="POST" action="{{ route('admin.update-user', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    <input type="hidden" id="editUserId">
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" id="editName" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" id="editEmail" name="email" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>

        </div>
    </div>

    <script src="{{ asset('js/adminIndex.js') }}"></script>
    @endsection
