@extends('master.layouts')
@section('title')
    Dashboard
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
@endpush
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" data-bs-delay="5000">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ $message }}
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.alert').classList.add('fade');
                document.querySelector('.alert button').click();
            }, 5000);
        </script>
    @endif
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- Small Box (Stat card) -->
            <h5 class="mb-2 mt-4">Informasi</h5>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Murid</h3>
                            <h5>
                                Total : {{ $murid }}
                            </h5>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="{{ route('murids.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Pegawai</h3>
                            <h5>
                                Total : {{ $pegawai }}
                            </h5>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="{{ route('pegawais.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>Orang tua</h3>
                            <h5>
                                Total :
                            </h5>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="{{ route('orangtuas.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>Staff</h3>
                            <h5>
                                Total : {{ $staf }}
                            </h5>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="{{ route('admins.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div> --}}
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <h4 class="mt-4 mb-2">Informasi Akademik</h4>
            <div class="col-md mx-auto">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Jadwal Belajar</h3>
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ route('jadwals.index') }}" class="btn btn-sm btn-success">
                                <i class="fas fa-clock mr-2">+</i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Contoh data jadwal belajar
                                $jadwal_belajar = [['Matematika', '08:00', '10:00'], ['Fisika', '10:00', '12:00'], ['Kimia', '13:00', '15:00']];
                                
                                // Loop untuk menampilkan data jadwal belajar
                                foreach ($jadwal_belajar as $index => $jadwal) {
                                    echo '<tr>';
                                    echo '<td>' . ($index + 1) . '</td>';
                                    echo '<td>' . $jadwal[0] . '</td>';
                                    echo '<td>' . $jadwal[1] . '</td>';
                                    echo '<td>' . $jadwal[2] . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@push('js')
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endpush
