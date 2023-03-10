<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('image/images/' . App\Models\Profilapp::first()->logo) }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light brand-sm">
            <small>{{ App\Models\Profilapp::first()->nama }}</small></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if (Auth::check())
                <div class="image">
                    <img src="/image/images/{{ Auth::user()->foto }}"class="img-circle elevation-2 " alt="user image">
                </div>
            @endif
            <div class="info">
                <a class="text-white">{{ Auth::user()->nama }} </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('super_admin.index') }}" class="nav-link">
                        <i class="nav-main-link-icon si si-speedometer"></i>
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
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
