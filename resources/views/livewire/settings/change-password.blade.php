<div>
    {{-- Stop trying to control. --}}
    <form class="p-4 border rounded shadow-sm bg-light" wire:submit.prevent="change_password">
        @include('layout.all_notif')
        <h1 class="mb-4 text-center flex justify-center">
            <span class="material-symbols-outlined">
                lock
                </span>
            <p class="font-bold">Change Password</p>
        </h1>

        <!-- Old Password -->
        <div class="mb-3 row align-items-center">
            <label for="oldPassword" class="col-sm-3 col-form-label text-end">
                <span class="material-symbols-outlined">
                    vpn_key
                </span> Old Password
            </label>
            <div class="col-sm-9">
                <input wire:model="old_password" type="password" class="form-control" id="oldPassword"
                    placeholder="Enter your old password">
                @error('old_password')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- New Password -->
        <div class="mb-3 row align-items-center">
            <label for="newPassword" class="col-sm-3 col-form-label text-end">
                <span class="material-icons text-muted" style="font-size: 20px;">password</span> New Password
            </label>
            <div class="col-sm-9">
                <input wire:model="new_password" type="password" class="form-control" id="newPassword"
                    placeholder="Enter your new password">
                @error('new_password')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg d-flex align-items-center gap-2 mx-auto">
                <span class="material-icons">send</span> Submit
            </button>
        </div>
    </form>
</div>
