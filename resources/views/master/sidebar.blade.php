<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="display: flex; align-items: center;">
            @if (Auth::check())
                <div class="image">
                    <img src="/image/images/{{ Auth::user()->foto }}" class="img-circle elevation-2 " alt="user image">
                </div>
            @endif
            <div class="info">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <h5>
                                    <span
                                        class="mr-2 d-none d-lg-inline text-white small">{{ Auth::user()->nama }}</span>
                                    <i class="fas fa-angle-down"></i>
                                </h5>
                            </a>
                            <ul class="nav nav-treeview collapse" id="submenu">
                                <li class="nav-item">
                                    <a href="{{ route('logout.index') }}" class="nav-link"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt nav-icon"></i>
                                        <p>Logout</p>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout.index') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('super_admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }} active">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <p>
                            User Management
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profilapps.index') }}" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <p>
                            Setting APP
                        </p>
                    </a>
                </li>


                {{-- batas bawah siderbar --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
