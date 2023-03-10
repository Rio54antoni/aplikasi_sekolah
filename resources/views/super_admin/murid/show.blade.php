@extends('master.layouts')
@section('title')
    Lihat Murid
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@section('content')
    {{-- kalau ambaik dari section lansuang blok section t paste --}}
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Detail Data</h3>
                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Nama : {{ $data->nama }}
                        </div>

                        <div class="form-group">
                            Email : <em> {{ $data->email }}
                            </em>
                        </div>
                        Kontak
                        <div class="form-group">
                            No. telepon : {{ $data->notelepon }} / No. Hp {{ $data->nohp }}
                        </div>
                        <div class="form-group">
                            Agama : {{ $data->agama->nama }}
                        </div>
                        <div class="form-group">
                            Jenis Kelamin : {{ $data->jeniskelamin->nama }}
                        </div>
                        <div class="form-group">
                            Tanggal Lahir : {{ \Carbon\Carbon::parse($data->tgl_lahir)->isoFormat(' DD MMMM YYYY') }}
                        </div>
                        <div class="form-group">
                            Alamat : {{ $data->alamat }}
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header float-center">
                        <h3 class="card-title">Foto Murid</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class=" img-fluid" src="/image/{{ $data->foto }} "width="100px" height="100px">
                        </div>
                        <div class="form-group text-center">
                            NIS : {{ $data->nis }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="col-4">
                        <a href="{{ route('murids.index') }}" class="btn btn-danger mb-4 ml-2">Kembali</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
@endsection
