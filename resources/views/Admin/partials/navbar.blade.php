<div class="w-full bg-slate-400 h-[50px]">
    <div class="flex justify-end">
                <form class="m-2 p-2 text-xl font-bold" method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"><span><i class="material-icons">logout</i></span></button>
        </form>
        <span class="border-r-2 border-black h-10 m-2"></span>
        <span class="m-2 p-2 text-xl font-bold">Info</span>
        <span class="border-r-2 border-black h-10 m-2"></span>
        <span class="m-2 p-2 text-xl font-bold">Contact Us</span>
        <span class="border-r-2 border-black h-10 m-2"></span>
        <span class="m-2 p-2 text-xl font-bold">Contact Us</span>
    </div>
</div>
