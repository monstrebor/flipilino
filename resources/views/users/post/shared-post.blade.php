@if($post->original_post_id)
    <div class="shared-post mb-3 border rounded-4 bg-white shadow-sm">
        <div class="p-2 border-bottom d-flex align-items-center gap-2 text-muted small">
            <i class="fas fa-share text-primary"></i>
            <span>
                <strong>{{ $post->user->name }}</strong> shared a post
            </span>
        </div>

        <div class="p-3 bg-light rounded-bottom">
            <div class="d-flex align-items-center gap-2 mb-2">
                <x-user-avatar />
                <div>
                    <strong>{{ $post->originalPost->user->name }}</strong><br>
                    <small class="text-muted">
                        {{ $post->originalPost->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>

            <div class="card border-0 bg-white shadow-sm rounded-4 overflow-hidden">
                <div class="card-body">
                    @if($post->originalPost->post_text)
                        <p class="mb-2">{{ $post->originalPost->post_text }}</p>
                    @endif

                    @if($post->originalPost->images->count())
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($post->originalPost->images as $img)
                                <img src="{{ asset('storage/' . $img->image_path) }}"
                                     class="rounded-3 border"
                                     style="max-width: 32%; height:200px; object-fit: cover;">
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
