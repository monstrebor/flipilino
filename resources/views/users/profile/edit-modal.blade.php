<div id="editIntroModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6">
        <h3 class="text-lg font-semibold mb-4">Edit Intro</h3>

        <form action="{{ route('user.profile-intro-update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Bio</label>
                <textarea name="bio" class="form-input w-full border rounded p-2" rows="3"
                    placeholder="Write something...">{{ old('bio', optional($user->profile)->bio) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Facebook</label>
                <input type="url" name="facebook_link" class="form-input w-full border rounded p-2"
                    value="{{ old('facebook_link', optional($user->profile)->facebook_link) }}">
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Twitter</label>
                <input type="url" name="twitter_link" class="form-input w-full border rounded p-2"
                    value="{{ old('twitter_link', optional($user->profile)->twitter_link) }}">
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Instagram</label>
                <input type="url" name="instagram_link" class="form-input w-full border rounded p-2"
                    value="{{ old('instagram_link', optional($user->profile)->instagram_link) }}">
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">TikTok</label>
                <input type="url" name="tiktok_link" class="form-input w-full border rounded p-2"
                    value="{{ old('tiktok_link', optional($user->profile)->tiktok_link) }}">
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">GitHub</label>
                <input type="url" name="github_link" class="form-input w-full border rounded p-2"
                    value="{{ old('github_link', optional($user->profile)->github_link) }}">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="document.getElementById('editIntroModal').classList.add('hidden')"
                    class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800">Cancel</button>
                <button type="submit"
                    class="px-4 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</div>