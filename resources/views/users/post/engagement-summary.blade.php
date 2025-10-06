@php
    // Count all reactions
    $reactionCount = \App\Models\Reaction::where('post_image_id', $post->id)->count();

    // Count all comments
    $commentCount = \App\Models\Comment::where('post_image_id', $post->id)->count();

    $userReaction = auth()->check()
        ? \App\Models\Reaction::where('post_image_id', $post->id)
            ->where('user_id', auth()->id())
            ->first()
        : null;

    $reactionEmojis = [
        'like' => '👍',
        'heart' => '❤️',
        'care' => '🤗',
        'haha' => '😄',
        'wow' => '😮',
        'sad' => '😢',
        'angry' => '😡',
    ];
@endphp

<div class="d-flex justify-content-between align-items-center text-muted small px-2 pb-2">
    <div class="d-flex align-items-center gap-1 reaction-summary" data-post="{{ $post->id }}" data-bs-toggle="modal"
        data-bs-target="#reactorsModal-{{ $post->id }}" style="cursor: pointer;">
        @php
            $topReactions = \App\Models\Reaction::where('post_image_id', $post->id)
                ->select('type')
                ->groupBy('type')
                ->pluck('type');
        @endphp

        @foreach ($topReactions as $type)
            <span style="font-size: 16px;">{{ $reactionEmojis[$type] ?? '' }}</span>
        @endforeach

        @if ($reactionCount > 0)
            <span>
                @if ($userReaction)
                    @if ($reactionCount === 1)
                        You
                    @else
                        You and {{ $reactionCount - 1 }} others
                    @endif
                @else
                    {{ $reactionCount }} {{ Str::plural('other', $reactionCount) }}
                @endif
            </span>
        @endif
    </div>

    @if ($commentCount > 0)
        <div class="text-muted small">
            {{ $commentCount }} {{ Str::plural('Comment', $commentCount) }}
        </div>
    @endif
</div>
<!-- Reactors Modal -->
<div class="modal fade" id="reactorsModal-{{ $post->id }}" tabindex="-1" aria-labelledby="reactorsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header">
                <h6 class="modal-title" id="reactorsModalLabel">Reactions</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-0">
                @php
                    $reactionsGrouped = \App\Models\Reaction::where('post_image_id', $post->id)
                        ->with('user')
                        ->get()
                        ->groupBy('type');
                @endphp

                <!-- Reaction Tabs -->
                <ul class="nav nav-tabs nav-fill small" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="all-tab-{{ $post->id }}" data-bs-toggle="tab"
                            data-bs-target="#all-{{ $post->id }}" type="button" role="tab">All</button>
                    </li>
                    @foreach ($reactionsGrouped as $type => $group)
                        <li class="nav-item">
                            <button class="nav-link" id="{{ $type }}-tab-{{ $post->id }}" data-bs-toggle="tab"
                                data-bs-target="#{{ $type }}-{{ $post->id }}" type="button" role="tab">
                                {{ $reactionEmojis[$type] ?? '' }} {{ ucfirst($type) }} ({{ $group->count() }})
                            </button>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab Contents -->
                <div class="tab-content p-3" style="max-height: 350px; overflow-y: auto;">
                    <!-- All Tab -->
                    <div class="tab-pane fade show active" id="all-{{ $post->id }}" role="tabpanel">
                        @foreach ($reactionsGrouped->flatten() as $reaction)
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ $reaction->user->profile_picture ?? asset('images/default-avatar.png') }}"
                                    class="rounded-circle me-2" width="35" height="35" alt="User">
                                <div>
                                    <div class="fw-semibold">{{ $reaction->user->name }}</div>
                                    <div style="font-size: 14px;">{{ $reactionEmojis[$reaction->type] ?? '' }}
                                        {{ ucfirst($reaction->type) }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Per Reaction Tabs -->
                    @foreach ($reactionsGrouped as $type => $group)
                        <div class="tab-pane fade" id="{{ $type }}-{{ $post->id }}" role="tabpanel">
                            @foreach ($group as $reaction)
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ $reaction->user->profile_picture ?? asset('images/default-avatar.png') }}"
                                        class="rounded-circle me-2" width="35" height="35" alt="User">
                                    <div>
                                        <div class="fw-semibold">{{ $reaction->user->name }}</div>
                                        <div style="font-size: 14px;">{{ $reactionEmojis[$reaction->type] ?? '' }}
                                            {{ ucfirst($reaction->type) }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>