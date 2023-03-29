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
            {{-- kata sambutan --}}
            <div class="col-mx-auto mt-4">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">SEALAMAT DATANG DI</h3>
                        <h3 class="widget-user-username">SISTEM INFORMASI MANJEMEN SEKOLAH </h3>
                    </div>
                    <div class="widget-user-image">
                        <img src="{{ asset('image/images/' . App\Models\Profilapp::first()->logo) }}"
                            class="img-circle elevation-2 " alt="user image">
                    </div>
                    <div class="card-body bg-info">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{ App\Models\Profilapp::first()->nama }}</h5>
                                    <span class="description-text">NSS : {{ App\Models\Profilapp::first()->nss }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">KONTAK</h5>
                                    <span class="description-text">Email : {{ App\Models\Profilapp::first()->email }}</span>
                                    <br>
                                    <span class="description-text">No.Telepon :
                                        {{ App\Models\Profilapp::first()->notelepon }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">ALAMAT</h5>
                                    <span class="description-text">
                                        {{ App\Models\Profilapp::first()->alamat }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3">
                                <div class="description-block">
                                    <h5 class="description-header">AKREDITASI</h5>
                                    <span class="description-text">
                                        {{ App\Models\Profilapp::first()->akreditasi }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
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
                            <i class="fas fa-users"></i>
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
                            <i class="fas fa-users"></i>
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
                            <i class="fas fa-users"></i>
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
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('admins.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@push('js')
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endpush
