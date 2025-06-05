<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative alert mb-1"
            role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button class="absolute top-0 bottom-0 right-0 px-4 py-3 alert-close">
                <i class="fas fa-times text-green-700"></i>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative alert mb-1" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
            <button class="absolute top-0 bottom-0 right-0 px-4 py-3 alert-close">
                <i class="fas fa-times text-red-700"></i>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative alert mb-1" role="alert">
            <strong class="font-bold">Whoops!</strong>
            <span class="block sm:inline">There were some problems with your input.</span>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button class="absolute top-0 bottom-0 right-0 px-4 py-3 alert-close">
                <i class="fas fa-times text-red-700"></i>
            </button>
        </div>
    @endif
</div>
