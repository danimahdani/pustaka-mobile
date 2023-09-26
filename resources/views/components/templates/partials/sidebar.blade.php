<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Pustaka Mobile</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard Admin</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i
                        class="fas fa-home"></i>
                    <span>Dashboard</span></a></li>
            <li class="{{ Request::is('dashboard/categories*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('categories.index') }}"><i class="fas fa-bookmark"></i>
                    <span>Categories</span></a></li>
            <li class="{{ Request::is('dashboard/books*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('books.index') }}"><i class="fas fa-book"></i>
                    <span>Books</span></a></li>
            <li class="{{ Request::is('dashboard/members*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('members.index') }}"><i class="fas fa-id-card"></i>
                    <span>Members</span></a></li>
            <li class="{{ Request::is('dashboard/borrowed-book*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('borrowed-book.index') }}"><i class="fas fa-id-card"></i>
                    <span>List Borrowed Book</span></a></li>
        </ul>

    </aside>
</div>
