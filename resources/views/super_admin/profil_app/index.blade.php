@extends('master.layouts')
@section('title')
    Setting App
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')
    @if ($message = Session::get('success'))
    @endif
    <section class="content">
        <div class="container-fluid">
            {{-- mulai logo data profil --}}
            <div class="row">
                <div class="col-md-6 offset-md-2">
                    <!-- Profile Image -->
                    <div class="card-deck card-equal-height">
                        <div class="col mx-auto">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="row">
                                        <div class="col-6">
                                            <h3 class="card-title text-center">IDENTITAS SEKOLAH</h3>
                                        </div>
                                        <div class="col-6 text-right">
                                            <a href="{{ route('profilapps.edit', $data->id) }}"
                                                class="btn btn-warning btn-square btn-sm">
                                                <i class="fas fa-edit text-light">Edit</i>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col mb-5">
                                        <img class="profile-user-img img-fluid img-circle img-lg "
                                            src="/image/{{ $data->logo }}">
                                    </div>
                                    <h3 class="profile-username text-center">{{ $data->nama }}</h3>
                                    <p class="text-muted text-center"> NPSN :
                                        {{ $data->npsn }}</p>
                                    <hr>
                                    <strong><i class="fas fa-address-book"></i> Kontak</strong>
                                    <p>
                                    <ul>
                                        <li>
                                            Email : {{ $data->email }}
                                        </li>
                                        <li>
                                            No.Telepon : {{ $data->telepon }}
                                        </li>
                                    </ul>
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                    <p>{{ $data->alamat }}, {{ $data->desa }}, {{ $data->kecamatan }},
                                        {{ $data->kabupaten }}, {{ $data->provinsi }}.
                                        <br>
                                        <em>Kode POS :</em>
                                        {{ $data->kodepos }}
                                    </p>
                                    <hr>
                                    Akreditasi : <strong class="text-lg"> {{ $data->akreditasi }}
                                    </strong>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
