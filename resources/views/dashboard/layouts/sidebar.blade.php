<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">SB Admin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="/dashboard">Dashboard</a></li>
            <li class="{{ Request::is('dash/posts*') ? 'active' : '' }}"><a href="/dash/posts">Daftar Postingan</a></li>
           @can('admin')
            <li class="{{ Request::is('dash/categories*') ? 'active' : '' }}"><a href="/dash/categories">Categories</a></li>
           @endcan
        </ul>
        <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
                <form action="/logout" method="post">
                    @csrf
                    <button class="btn btn-logout" type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
