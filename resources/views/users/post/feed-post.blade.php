<div class="card mb-4 shadow-sm border-0">
    <div class="card-body">
        <!-- Post Header -->
        <div class="d-flex align-items-center mb-2">
            <x-user-avatar />

            <div>
                <h6 class="mb-0 fw-bold">{{ $post->user->name }}</h6>
                <small class="text-muted fw-semibold" style="font-size: 11px;">
                    {{ $post->created_at->diffForHumans() }}
                </small>
            </div>
        </div>

        <!-- Post Text -->
        @if($post->post_text)
            <p class="mb-3">{{ $post->post_text }}</p>
        @endif

        <!-- Post Images -->
        @if($post->images->count())
            <div class="d-flex flex-wrap gap-2 mb-3">
                @foreach($post->images as $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}" class="rounded"
                        style="max-width: 32%; height:200px; object-fit: cover;">
                @endforeach
            </div>
        @endif

        @include('users.post.engagement-summary')
        <div class="post-actions border-top pt-2 text-muted position-relative">
            <div class="d-flex justify-content-around">
                @include('users.reactions.index')

                <!-- Comment Button -->
                <div class="d-flex align-items-center gap-2 cursor-pointer comment-toggle"
                    data-toggle-comments="{{ $post->id }}">
                    <i class="far fa-comment"></i>
                    <span>Comment</span>
                </div>

                <div class="d-flex align-items-center gap-2 cursor-pointer">
                    <i class="fas fa-share"></i>
                    <span>Share</span>
                </div>
            </div>
            @include('users.comments.index')
        </div>
    </div>
</div>