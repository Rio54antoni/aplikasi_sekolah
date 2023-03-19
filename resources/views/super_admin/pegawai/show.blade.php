@extends('master.layouts')
@section('title')
    Lihat Pegawai
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
@endpush
@section('content')
    {{-- kalau ambaik dari section lansuang blok section t paste --}}
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="/image/images/{{ $data->foto_diri }} " alt="User profile picture" height="120px">
                            </div>
                            <h3 class="profile-username text-center">{{ $data->nama }}</h3>
                            <p class="text-muted text-center">NIP : {{ $data->nip }}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <i class="fas fa-sm fa-phone"></i><b> Contact :</b>
                                    <p class="float-right">{{ $data->telpon }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Email :</b>
                                    <p class="float-right">{{ $data->email }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <a href="{{ route('pegawais.index') }}" class="btn btn-danger mb-4 ml-2">Kembali</a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h5>Detail data pegawai</h5>
                        </div>
                        <div class="card-body">
                            <strong><i class="far fa-file-alt mr-1"></i> Personal</strong>
                            <p class="text-muted ">Nama : {{ $data->nama }}
                            <p class="float-right text-muted"> NPWP :
                                {{ $data->npwp }}</p>
                            </p>
                            <p class="text-muted">NIK : {{ $data->nik }}</p>
                            <p class="text-muted">Tempat, tanggal lahir : {{ $data->tempat_lahir }},
                                {{ \Carbon\Carbon::parse($data->tanggal_lahir)->isoFormat(' DD MMMM YYYY') }}</p>
                            <p class="text-muted">Agama : {{ $data->_agama->nama }}</p>
                            <p class="text-muted">Jenis kelamin : {{ $data->jenis_kelamin }}</p>
                            <p class="text-muted">Status Pernikahan : {{ $data->sts_pernikahan }}</p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> Kepegawaian</strong>
                            <p class="text-muted ">Jabatan : {{ $data->jabatan->nama }}
                            <p class="float-right text-muted ">Tanggal terdaftar :
                                {{ \Carbon\Carbon::parse($data->tgl_daftar)->isoFormat('dddd DD MMMM YYYY') }}</p>
                            </p>
                            <p class="text-muted ">Status : {{ $data->id_status }}</p>
                            <p class="text-muted">Pendidikan (gelar) : {{ $data->id_pendidikan }} ({{ $data->gelar }})
                            </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                            <p class="text-muted">{{ $data->alamat }}</p>
                            <hr>
                            <strong><i class="fas fa-camera"></i> File Foto</strong>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="/image/{{ $data->foto_diri }}" data-toggle="lightbox"
                                            data-title="Foto Pegawai" data-gallery="gallery">
                                            <img src="/image/images/{{ $data->foto_diri }} " class="img-fluid mb-2"
                                                alt="black sample" />
                                        </a>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/image/{{ $data->foto_ktp }}" data-toggle="lightbox" data-title="Foto KTP"
                                            data-gallery="gallery">
                                            <img src="/image/images/{{ $data->foto_ktp }} " class="img-fluid mb-2"
                                                alt="black sample" />
                                        </a>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/image/{{ $data->foto_ijazah }}" data-toggle="lightbox"
                                            data-title="Foto Ijazah" data-gallery="gallery">
                                            <img src="/image/images/{{ $data->foto_ijazah }} " class="img-fluid mb-2"
                                                alt="black sample" />
                                        </a>
                                    </div>
                                    <div class="col-sm-2">
                                        @if ($data->foto_npwp)
                                            <a href="/image/{{ $data->foto_npwp }}" data-toggle="lightbox"
                                                data-title="Foto NPWP" data-gallery="gallery">
                                                <img src="/image/images/{{ $data->foto_npwp }} " class="img-fluid mb-2"
                                                    alt="black sample" />
                                            </a>
                                        @else
                                            <a href="https://via.placeholder.com/1200/000000.png?text=5"
                                                data-toggle="lightbox" data-title="Kosong" data-gallery="gallery">
                                                <img src="https://via.placeholder.com/300/000000?text=5"
                                                    class="img-fluid mb-2" alt="black sample" />
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@push('js')
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <!-- Filterizr-->
    <script src="{{ asset('assets/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
@endpush
