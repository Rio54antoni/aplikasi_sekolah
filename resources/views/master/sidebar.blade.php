<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">
        <span class="brand-text font-weight-light">SIM - SEKOLAH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('image/images/' . App\Models\Profilapp::first()->logo) }}"
                    class="img-circle elevation-2 " alt="user image">
            </div>
            <div class="info">
                <p class="d-block"> {{ App\Models\Profilapp::first()->nama }}</p>
            </div>
        </div> --}}
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">-- Main Menu --</li>
                <li class="nav-item">
                    <a href="{{ route('super_admin.index') }}"
                        class="nav-link {{ request()->routeIs('super_admin.index') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ set_expand(['murids.index', 'rekapsiswa.index']) }}">
                    <a href="#" class="nav-link  {{ set_active(['murids.index']) }}">
                        <i class="fas fa-users"></i>
                        <p>
                            Siswa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('murids.index') }}" class="nav-link {{ set_active(['murids.*']) }}">
                                <i class="fas fa-book"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rekapsiswa.index') }}"
                                class="nav-link {{ set_active(['rekapsiswa.index']) }}">
                                <i class="far fa-file"></i>
                                <p>Rekap Siswa</p>
                            </a>
                        </li>
                    </ul>
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
                        <i class="fas fa-user-plus"></i>
                        <p>
                            User Management
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profilapps.index') }}"
                        class="nav-link {{ request()->routeIs('profilapps.*') ? ' active' : '' }}">
                        <i class="fas fa-cogs"></i>
                        <p>
                            Setting APP
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ set_expand(['jadwals.index', 'mata_pelajarans.index', 'kelas.index']) }}">
                    <a href="#"
                        class="nav-link  {{ set_active(['jadwals.index', 'mata_pelajarans.index', 'kelas.index']) }}">
                        <i class="fas fa-list"></i>
                        <p>
                            Penjadwalan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('jadwals.index') }}" class="nav-link {{ set_active(['jadwals.*']) }}">
                                <i class="far fa-calendar"></i>
                                <p>Jadwal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mata_pelajarans.index') }}"
                                class="nav-link {{ set_active(['mata_pelajarans.*']) }}">
                                <i class="far fa-file"></i>
                                <p>Mata Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kelas.index') }}" class="nav-link {{ set_active(['kelas.*']) }}">
                                <i class="fas fa-clipboard"></i>
                                <p>Kelas</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('nilais.index') }}"
                        class="nav-link {{ request()->routeIs('nilais.*') ? ' active' : '' }}">
                        <i class="fas fa-book"></i>
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
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-book"></i>
                        <p>
                            Absensi Siswa
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
