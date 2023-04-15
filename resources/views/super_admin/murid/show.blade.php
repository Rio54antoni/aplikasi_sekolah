@extends('master.layouts')
@section('title')
    Lihat Murid
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
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Form Detail Data</h3>
                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for=""> Nama : </label>
                                    {{ $data->nama }}
                                </div>

                                <div class="form-group">
                                    <label for=""> Email : </label>
                                    <em> {{ $data->email }}
                                    </em>
                                </div>
                                <div class="form-group">
                                    <label for=""> No HP : </label>
                                    {{ $data->nohp }}
                                </div>
                                <div class="form-group">
                                    <label for=""> Alamat : </label>
                                    {{ $data->alamat }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Agama : </label>
                                    {{ $data->agama->nama }}
                                </div>
                                <div class="form-group">
                                    <label for=""> Jenis kelamin : </label>
                                    {{ $data->jenis_kelamin }}
                                </div>
                                <div class="form-group">
                                    <label for=""> Tempat lahir : </label>
                                    {{ $data->tempat_lahir }}
                                </div>

                                <div class="form-group">
                                    <label for=""> Tanggal lahir : </label>
                                    {{ \Carbon\Carbon::parse($data->tgl_lahir)->isoFormat(' DD MMMM YYYY') }}
                                </div>
                            </div>

                        </div>
                        <hr>
                        <label for=""> <em>Orang tua</em></label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">-Nama ayah : </label>
                                    {{ $data->ayah ?? 'tidak di isi' }}
                                    <br>
                                    <label for="">Pekerjaan : </label>
                                    {{ $data->pekerjaan_ayah->nama ?? 'tidak di isi' }}
                                </div>
                                <div class="form-group">
                                    <label for="">-Nama Ibu : </label>
                                    {{ $data->ibu ?? 'tidak di isi' }}
                                    <br>
                                    <label for="">Pekerjaan :
                                    </label>{{ $data->pekerjaan_ibu->nama ?? 'tidak di isi' }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">-Wali : </label>{{ $data->wali ?? 'tidak di isi' }}
                                    <br>
                                    <label for="">Pekerjaan :
                                    </label>{{ $data->pekerjaan_wali->nama ?? 'tidak di isi' }}
                                </div>
                                <div class="form-group">
                                    <label for="">kontak orang tua : </label>{{ $data->nohp_ortu }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header float-center">
                        <h3 class="card-title">Foto {{ $data->nama }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="/image/{{ $data->foto_diri }}" data-toggle="lightbox"
                                data-title="Foto {{ $data->nama }}" data-gallery="gallery">
                                <img src="/image/images/{{ $data->foto_diri }} " class="img-fluid mb-2"
                                    alt="black sample" />
                            </a>
                        </div>
                        <div class="form-group text-center">
                            NIS : {{ $data->nis }}
                        </div>
                        <div class="form-group text-center">
                            Tedaftar :
                            {{ \Carbon\Carbon::parse($data->tgl_daftar)->isoFormat('dddd, DD MMMM YYYY') }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="col-4">
                        <a href="{{ route('murids.index') }}" class="btn btn-danger mb-4 ml-2">Kembali</a>
                    </div>
                </div>
                <!-- /.card -->
                <div class="card card-primary card-outline">
                    <div class="card-header float-center">
                        <h3>QR Code untuk {{ $data->nama }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            {{-- {!! QrCode::size(100)->generate($data->nis) !!} --}}
                            <img src="data:image/png;base64,{{ $qrCode }}">
                            <p>Nomor Induk Siswa: {{ $data->nis }}</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
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
