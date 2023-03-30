<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link text-center">
        SIM - SEKOLAH
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('image/images/' . App\Models\Profilapp::first()->logo) }}"
                    class="img-circle elevation-2 " alt="user image">
            </div>
            <div class="info">
                <a class="d-block"> {{ App\Models\Profilapp::first()->nama }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <div class="info">
                    <a class="d-block">-- Main Menu --</a>
                </div>

                <li class="nav-item">
                    <a href="{{ route('super_admin.index') }}"
                        class="nav-link {{ request()->routeIs('super_admin.index') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('murids.index') }}"
                        class="nav-link {{ request()->routeIs('murids.*') ? ' active' : '' }}">
                        <i class="fas fa-users"></i>
                        <p>
                            Siswa
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pegawais.index') }}"
                        class="nav-link {{ request()->routeIs('pegawais.*') ? ' active' : '' }}">
                        <i class="fas fa-users"></i>
                        <p>
                            Pegawai
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admins.index') }}"
                        class="nav-link {{ request()->routeIs('admins.*') ? ' active' : '' }}">
                        <i class="fas fa-users"></i>
                        <p>
                            Staff
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <i class="fas fa-cog"></i>
                        <p>
                            User Management
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profilapps.index') }}"
                        class="nav-link {{ request()->routeIs('profilapps.*') ? ' active' : '' }}">
                        <i class="fas fa-cog"></i>
                        <p>
                            Setting APP
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ set_expand(['jadwals.index', 'mata_pelajarans.index', 'kelas.index']) }}">
                    <a href="#"
                        class="nav-link  {{ set_active(['jadwals.index', 'mata_pelajarans.index', 'kelas.index']) }}">
                        <i class="fas fa-book"></i>
                        <p>
                            Penjadwalan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('jadwals.index') }}" class="nav-link {{ set_active(['jadwals.*']) }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jadwal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mata_pelajarans.index') }}"
                                class="nav-link {{ set_active(['mata_pelajarans.*']) }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mata Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kelas.index') }}" class="nav-link {{ set_active(['kelas.*']) }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelas</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('nilais.index') }}"
                        class="nav-link {{ request()->routeIs('nilais.*') ? ' active' : '' }}">
                        <i class="fas fa-cog"></i>
                        <p>
                            Data Nilai
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tahuns.index') }}"
                        class="nav-link {{ request()->routeIs('tahuns.*') ? ' active' : '' }}">
                        <i class="fas fa-table"></i>
                        <p>
                            Tahun Ajaran
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
