<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        @if(auth()->user()->access === 'User' || auth()->user()->access === 'Admin')
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="/">
                    <span data-feather="home"></span>
                    Home <span class="sr-only"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/artists/create">
                    <span data-feather="file"></span>
                    New Artist
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/albums/create">
                    <span data-feather="file"></span>
                    New Album
                </a>
            </li>
            @if(auth()->user()->access === 'Admin')
            <li class="nav-item">
                <a class="nav-link" href="/users/create">
                    <span data-feather="file"></span>
                    New User
                </a>
            </li>
            @endif
        </ul>
        @endif

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>View</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="/artists">
                    <span data-feather="users"></span>
                    Artists
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/albums">
                    <span data-feather="folder"></span>
                    Albuns
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/songs">
                    <span data-feather="music"></span>
                    Songs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users">
                    <span data-feather="user"></span>
                    Users
                </a>
            </li>
        </ul>
    </div>
</nav>
