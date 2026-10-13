<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">

        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="{{ Auth::user()->name }}" src="{{ Auth::user()->avatar_url }}" class="rounded-circle mr-1" style="width: 30px; height: 30px; object-fit: cover;">
                <div class="d-sm-none d-lg-inline-block">مرحباً، {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.profile.index') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> الملف الشخصي
                </a>
                <a href="{{ route('admin.settings.index') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> إعدادات الموقع
                </a>
                <a href="{{ route('home') }}" target="_blank" class="dropdown-item has-icon">
                    <i class="fas fa-external-link-alt"></i> زيارة الموقع
                </a>
                <div class="dropdown-divider"></div>

                <form action="{{ route('logout') }}" id="logout-btn" method="post">
                    @csrf

                    <a href="#" onclick="event.preventDefault(); document.querySelector('#logout-btn').submit();"
                       class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                    </a>
                </form>


            </div>
        </li>
    </ul>
</nav>
