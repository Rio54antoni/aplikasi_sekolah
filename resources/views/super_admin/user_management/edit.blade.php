@extends('master.layouts')
@section('title')
    Edit User Management
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
@endpush
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <form action="{{ route('users.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input name="nama" value="{{ old('nama', $data->nama) }}" type="text"
                                        class="form-control  @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Masukan nama lengkap">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input name="email" value="{{ old('email', $data->email) }}" type="email"
                                        class="form-control  @error('email') is-invalid @enderror" id="email"
                                        placeholder="Masukan email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" value="{{ old('password') }}"
                                        class="form-control  @error('password') is-invalid @enderror" id="password"
                                        placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Password Konfirmasi</label>
                                    <input name="password_confirmation" type="password"
                                        value="{{ old('password_confirmation') }}"
                                        class="form-control  @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" placeholder="Password Konfirmasi">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                                        <option>Pilih</option>
                                        @foreach ($role as $tipe)
                                            <option
                                                value="{{ $tipe['nama'] }}"{{ old('role', $data->role) == $tipe['nama'] ? 'selected' : null }}>
                                                {{ $tipe['keterangan'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="foto">Upload Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="foto" type="file" class="custom-file-input" id="foto"
                                                value="{{ old('foto') }}" class="@error('foto') is-invalid @enderror">
                                            <label class="custom-file-label" for="foto">Klik untuk mengganti
                                                foto</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        @error('foto')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                                &nbsp;
                                <a href="{{ route('users.index') }}" class="btn btn-danger">
                                    Batal
                                </a>
                            </div>
                    </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="card card-success ">
                        <div class="card-header ">
                            <h3 class="card-title">Foto Profil</h3>
                        </div>
                        <div class="card-body card-center">
                            <img src="/image/{{ $data->foto }}" width="150px" height="200px">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
@push('js')
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endpush
