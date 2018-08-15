<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Music Library</a>
    <form action="/search" method="POST" style="width: 100%">
        @csrf
        <input name="search" class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" required maxlength="20" minlength="2">
    </form>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="/logout">Sign out</a>
        </li>
    </ul>
</nav>
