<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="material-icons">home</i> <span>Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="material-icons">group</i> <span>Users</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="material-icons">person</i> <span>Profile</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="material-icons">settings</i> <span>Settings</span></a>
        </li>
        <li class="nav-item">
            @csrf
            <form method="POST" action="{{ route('logout') }}">
                <button type="submit"><i class="material-icons">logout</i> <span>Logout</span></button>
            </form>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#"><i class="material-icons">block</i> <span>Disabled</span></a>
        </li>
    </ul>
</div>