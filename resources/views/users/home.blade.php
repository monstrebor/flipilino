<div class="ml-[200px]">
    <h1 class="text-center">This is the home</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal">
        Create Post
    </button>

    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog mt-5">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="postModalLabel">Create Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="d-flex align-items-center mb-3">
                        <img src="#" class="rounded-circle me-2" alt="Avatar">
                        <div>
                            <div class="fw-bold">John Doe</div>
                            <small class="text-muted">Public</small>
                        </div>
                    </div>

                    <form action="{{ route('user.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <textarea name="post_content" class="form-control border-0" rows="4"
                                placeholder="What's on your mind, {{ Auth::user()->name }}?"
                                style="resize:none;"></textarea>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border rounded px-3 py-2 mb-3">
                            <span class="text-muted">Add to your post</span>
                            <div class="d-flex gap-2">
                                <!-- Image icon triggers file input -->
                                <label for="image-upload" style="cursor:pointer;">
                                    <i class="fas fa-image text-success fs-5"></i>
                                </label>
                                <input type="file" name="post_image" id="image-upload" accept="image/*"
                                    style="display: none;">

                                <!-- Optional icons -->
                                <i class="fas fa-smile text-warning fs-5 cursor-pointer"></i>
                                <i class="fas fa-video text-danger fs-5 cursor-pointer"></i>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
