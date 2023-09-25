<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="/">My Post</a>
        <div class="collapse navbar-collapse container" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('posts') ? 'active' : '' }}" href="/posts">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">Profile</a>
                </li>
            </ul>
            @auth
            <a href="/dashboard" class="btn btn-outline-light"> <i class="bi bi-postcard-fill"></i> </i>Dashboard</a>
            @else
            <a href="/login" class="btn btn-outline-light"> <i class="bi bi-box-arrow-in-right"> </i>Login</a>
            @endauth
        </div>
    </div>
</nav>
