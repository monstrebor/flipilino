<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-3">
            <form id="shareForm" method="POST" action="">
                @csrf
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-semibold" id="shareModalLabel">Share Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <x-user-avatar />
                            <strong>{{ Auth::user()->name }}</strong>
                        </div>
                        <textarea name="post_text" class="form-control rounded-3" rows="1"
                            placeholder="Write something about this..."></textarea>
                    </div>
                    <div id="sharePostPreview" class="border rounded p-2 bg-light small text-muted">
                    </div>
                </div>

                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Share</button>
                </div>
            </form>
        </div>
    </div>
</div>
