<!-- Modal -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-4">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 d-flex justify-content-center">
                <h5 class="modal-title fw-bold fs-4 text-center w-100" id="postModalLabel">
                    Create Post
                </h5>
                <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="d-flex align-items-center">
                    <div>
                        <img src="https://tse1.mm.bing.net/th/id/OIP.uxCC-VO5jt3QWKaHGH2m1wHaHP?rs=1&pid=ImgDetMain&o=7&rm=3"
                            class="rounded-circle me-2 w-10 l-10" alt="Avatar">
                        <div class="fw-bold">John Doe</div>
                        <small class="text-muted">Public</small>
                    </div>
                </div>
            </div>

            <form action="{{ route('user.post') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <textarea name="post_content" class="form-control border-0" rows="4"
                        placeholder="What's on your mind, {{ Auth::user()->name }}?" style="resize:none;"></textarea>
                </div>

                <!-- Image Preview Section -->
                <div id="image-preview-container" class="position-relative mb-3 d-none">
                    <img id="image-preview" class="img-fluid rounded w-full"
                        style="max-height: 300px; object-fit: cover;" />

                    <!-- Buttons on top of image -->
                    <div class="position-absolute top-0 start-0 m-2 d-flex gap-2">
                        <!-- Add More -->
                        <button type="button" class="btn btn-sm btn-light shadow-sm">
                            <i class="fas fa-plus"></i>
                        </button>
                        <!-- Edit -->
                        <button type="button" class="btn btn-sm btn-light shadow-sm">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>

                    <!-- Remove (X button) -->
                    <button type="button" id="remove-image-btn"
                        class="btn btn-sm btn-light shadow-sm position-absolute top-0 end-0 m-2">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="d-flex justify-content-between align-items-center border rounded px-3 py-2 mb-3">
                    <span class="text-muted">Add to your post</span>
                    <div class="d-flex gap-3">
                        <!-- Photo/Video -->
                        <div>
                            <label for="post-image-upload" style="cursor:pointer;">
                                <i class="fas fa-image text-success fs-5" title="Photo/Video"></i>
                            </label>
                            <input type="file" id="post-image-upload" name="post_image" accept="image/*"
                                style="display:none;">
                        </div>

                        <!-- Tag People -->
                        <i class="fas fa-user-tag text-primary fs-5 cursor-pointer" title="Tag People"></i>
                        <!-- Feeling/Activity -->
                        <i class="fas fa-smile text-warning fs-5 cursor-pointer" title="Feeling/Activity"></i>
                        <!-- Check In -->
                        <i class="fas fa-map-marker-alt text-danger fs-5 cursor-pointer" title="Check In"></i>
                        <!-- GIF -->
                        <i class="fas fa-file-image text-info fs-5 cursor-pointer" title="GIF"></i>
                        <!-- More -->
                        <i class="fas fa-ellipsis-h text-secondary fs-5 cursor-pointer" title="More"
                            id="openMoreModal"></i>
                    </div>
                </div>

                @include('users.post.more-modal')
                <button type="submit" class="btn btn-primary w-100">Post</button>
            </form>
        </div>
    </div>
</div>