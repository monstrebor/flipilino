<div class="comment-box bg-white border-top mt-3 p-3 rounded-bottom" id="comments-{{ $post->id }}"
    style="display: none;">
    <!-- Comment Input -->
    <div class="d-flex align-items-start gap-2 mb-3">
        <x-user-avatar />


        <form action="{{ route('user.comment-store') }}" method="POST" class="flex-grow-1">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <div class="d-flex align-items-center bg-light rounded-pill px-3 py-1">
                <textarea name="content"
                    class="form-control border-0 comment-box-bg flex-grow-1 px-2 py-2 rounded-2xl mr-2" rows="1"
                    placeholder="Write a comment..." required></textarea>
                <button type="submit"
                    class="btn btn-primary btn-sm d-flex align-items-center justify-content-center rounded-circle shadow-sm"
                    style="width: 36px; height: 36px;">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </form>
    </div>

    <!-- Comments List -->
    <div class="comment-list mt-2">
        @php
            $comments = \App\Models\Comment::where('post_image_id', $post->id)
                ->whereNull('parent_id')
                ->with('user')
                ->latest()
                ->get();
        @endphp

        @foreach($comments as $comment)
            <div class="d-flex align-items-start mb-3">
                <!-- Avatar -->
                @php
                    $userId = $comment->user_id;
                @endphp
                <x-user-avatar :user="\App\Models\User::find($userId)" />

                <!-- Comment Content -->
                <div class="comment-content bg-light rounded px-3 py-2 flex-grow-1">
                    <strong>{{ $comment->user->name }}</strong>
                    <p class="mb-1">{{ $comment->content }}</p>
                </div>
            </div>

            <!-- Comment Actions -->
            <div class="d-flex gap-3 small text-muted ms-5 mt-n2 mb-2 align-items-center">
                <button class="btn btn-link btn-sm p-0 text-secondary">Like</button>
                <button class="btn btn-link btn-sm p-0 text-secondary">Reply</button>
                <span>· {{ $comment->created_at->diffForHumans() }}</span>

                @if(auth()->check() && auth()->id() === $comment->user_id)
                    <button class="btn btn-link btn-sm p-0 text-secondary comment-edit-toggle"
                        data-id="{{ $comment->id }}">Edit</button>

                    <form action="{{ route('user.comment-destroy', $comment) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link btn-sm p-0 text-danger">Delete</button>
                    </form>
                @endif
            </div>

            @if(auth()->check() && auth()->id() === $comment->user_id)
                <form action="{{ route('user.comment-update', $comment) }}" method="POST" class="comment-edit-form ms-5 mt-2"
                    style="display: none;">
                    @csrf
                    @method('PATCH')
                    <div class="d-flex align-items-center gap-2">
                        <textarea name="content" class="form-control form-control-sm rounded px-2 py-1 flex-grow-1"
                            rows="1">{{ $comment->content }}</textarea>
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill px-3">Save</button>
                        <button type="button" class="btn btn-light btn-sm rounded-pill px-3 cancel-edit">Cancel</button>
                    </div>
                </form>
            @endif
        @endforeach
    </div>
</div>