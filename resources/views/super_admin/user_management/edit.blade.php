@extends('master.layouts')
@push('css')

    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">User Management</a> / Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

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
