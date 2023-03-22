@extends('master.layouts')
@section('title')
    Lihat Data Staff
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
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Detail Data</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="">Nama :</label>
                                    {{ $data->nama }}
                                </div>
                                <div class="form-group">
                                    <label for="">Email :</label>
                                    <em> {{ $data->email }}</em>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat, tanggal lahir :</label>
                                    {{ $data->tempat_lahir }},
                                    {{ \Carbon\Carbon::parse($data->tanggal_lahir)->isoFormat(' DD MMMM YYYY') }}
                                </div>
                                <div class="form-group">
                                    <label for="">Status :</label> {{ $data->sts_pernikahan }}
                                </div>
                                <div class="form-group">
                                    <label for="">Agama :</label> {{ $data->agama->nama }}
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis kelamin : </label>{{ $data->jenis_kelamin }}
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat :</label> {{ $data->alamat }}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">NIK :</label>
                                    {{ $data->nik }}
                                </div>
                                <div class="form-group">
                                    <label for="">No.telepon/ Wa :</label>
                                    {{ $data->nohp }}
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal daftar :</label>
                                    {{ \Carbon\Carbon::parse($data->tgl_daftar)->isoFormat('dddd, DD MMMM YYYY') }}
                                </div>
                                <div class="form-group">
                                    <label for="">Jabatan :</label>
                                    {{ $data->jabatan->nama }}
                                </div>
                                <div class="form-group">
                                    <label for="">Status kerja :</label>
                                    {{ $data->id_status }}
                                </div>
                                <div class="form-group">
                                    <label for="">Pendidikan :</label>
                                    {{ $data->id_pendidikan }}
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card card-secondary">
                    <div class="card-header float-center">
                        <h3 class="card-title">Foto {{ $data->nama }}</h3>
                    </div>
                    <div class="card-body">
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="">Foto</label>
                                <a href="/image/{{ $data->foto_diri }}" data-toggle="lightbox"
                                    data-title="Foto {{ $data->nama }} " data-gallery="gallery">
                                    <img src="/image/images/{{ $data->foto_diri }} " class="img-fluid mb-2"
                                        alt="black sample" />
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <label for="">Foto KTP</label>
                                <a href="/image/{{ $data->foto_ktp }}" data-toggle="lightbox" data-title="Foto KTP"
                                    data-gallery="gallery">
                                    <img src="/image/images/{{ $data->foto_ktp }} " class="img-fluid mb-2"
                                        alt="black sample" />
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <label for="">Foto Ijazah</label>
                                <a href="/image/{{ $data->foto_ijazah }}" data-toggle="lightbox" data-title="Foto Ijazah"
                                    data-gallery="gallery">
                                    <img src="/image/images/{{ $data->foto_ijazah }} " class="img-fluid mb-2"
                                        alt="black sample" />
                                </a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <!-- /.card-body -->
                    <div class="col-4">
                        <a href="{{ route('admins.index') }}" class="btn btn-danger mb-4 ml-2">Kembali</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
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
