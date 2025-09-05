<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-home"></i> <span>Profile</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-cog"></i> <span>Users</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-user"></i> <span>Profile</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-cog"></i> <span>Settings</span></a>
        </li>
        <li class="nav-item">
            <form class="ml-2 p-2 text-xl font-bold" method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"><span><i class="material-icons text-white ml-">logout</i></span></button>
            </form>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#"><i class="fas fa-ban"></i> <span>Disabled</span></a>
        </li>
    </ul>
</div>