<div class="card mb-4 shadow-sm border-0">
    <div class="card-body">
        <!-- Post Header -->
        <div class="d-flex align-items-center mb-2">
            <img src="https://tse1.mm.bing.net/th/id/OIP.uxCC-VO5jt3QWKaHGH2m1wHaHP?rs=1&pid=ImgDetMain&o=7&rm=3"
                class="rounded-circle me-2 w-10 l-10" alt="Avatar">
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

        <!-- Action Bar -->
        <div class="d-flex justify-content-around border-top pt-2 text-muted">
            @include('users.reactions.index')
            <div class="d-flex align-items-center gap-2 cursor-pointer">
                <i class="far fa-comment"></i>
                <span>Comment</span>
            </div>
            <div class="d-flex align-items-center gap-2 cursor-pointer">
                <i class="fas fa-share"></i>
                <span>Share</span>
            </div>
        </div>
    </div>
</div>