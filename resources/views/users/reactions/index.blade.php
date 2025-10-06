<!-- Reaction Module -->
<div class="d-flex align-items-center gap-2 position-relative reaction-container">
    @php
        $userReaction = null;
        if (auth()->check()) {
            $userReaction = \App\Models\Reaction::where('post_image_id', $post->id)
                ->where('user_id', auth()->id())
                ->value('type');
        }

        $reactions = [
            'like' => ['emoji' => '👍', 'label' => 'Like'],
            'heart' => ['emoji' => '❤️', 'label' => 'Love'],
            'care' => ['emoji' => '🤗', 'label' => 'Care'],
            'haha' => ['emoji' => '😄', 'label' => 'Haha'],
            'wow' => ['emoji' => '😮', 'label' => 'Wow'],
            'sad' => ['emoji' => '😢', 'label' => 'Sad'],
            'angry' => ['emoji' => '😡', 'label' => 'Angry'],
        ];
    @endphp

    {{-- Display current user reaction or default Like --}}
    @if($userReaction)
        <span style="font-size: 18px;">{{ $reactions[$userReaction]['emoji'] }}</span>
        <span class="fw-semibold">{{ $reactions[$userReaction]['label'] }}</span>
    @else
        <i class="far fa-thumbs-up"></i>
        <span>Like</span>
    @endif

    <!-- Hover popup -->
    <div class="reaction-popup shadow-sm border rounded p-2 bg-white position-absolute">
        @foreach($reactions as $type => $data)
            <form action="{{ route('user.react-store') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="type" value="{{ $type }}">
                <button type="submit" class="reaction-btn" title="{{ $data['label'] }}">
                    {{ $data['emoji'] }}
                </button>
            </form>
        @endforeach
    </div>
</div>