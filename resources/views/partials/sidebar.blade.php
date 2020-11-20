<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="">{{ env('APP_NAME') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">{{ strtoupper(substr(env('APP_NAME'), 0, 2)) }}</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-users"></i>
                <span>Müşteri</span>
            </a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('/musteri/liste') }}">Listele</a></li>
            </ul>
        </li>
    </ul>
</aside>
