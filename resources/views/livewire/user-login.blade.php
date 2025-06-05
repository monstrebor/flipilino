<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form wire:submit.prevent="loginUser">
        <h3 class="mb-10 text-2xl text-white font-bold font-heading text-center">Login Account</h3>
        <div class="flex items-center pl-6 mb-3 bg-white rounded-full">
            <span class="inline-block font-bold pr-3 py-2 border-r border-gray-50 text-black">
                Email:
            </span>
            <input
                class="w-full pl-4 pr-6 py-4 font-bold placeholder-gray-500 text-black rounded-r-full focus:outline-none"
                wire:model='email' type="email" placeholder="example@email.com">
        </div>
        @error('email')
            <span class="text-lg bg-white p-1 text-red-500">
                {{ $message }}
            </span>
        @enderror
        <div class="flex items-center pl-6 mb-3 bg-white rounded-full">
            <span class="inline-block font-bold pr-3 py-2 border-r border-gray-50 text-black">
                Password:
            </span>
            <input
                class="w-full pl-4 pr-6 py-4 font-bold placeholder-gray-500 text-black rounded-r-full focus:outline-none"
                wire:model="password" type="password">
        </div>
        @error('password')
            <span class="text-lg bg-white p-1 text-red-500">
                {{ $message }}
            </span>
        @enderror
        <button type="submit"
            class="py-4 w-full bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-full transition duration-200">
            Login
        </button>
    </form>
</div>
