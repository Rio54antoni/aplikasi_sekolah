@extends('master.layouts')
@section('title')
    Edit App
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profil App</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('profilapps.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Sekolah</label>
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
                                    <label for="notelepon">No.Telepon</label>
                                    <input name="notelepon" value="{{ old('notelepon', $data->notelepon) }}" type="number"
                                        class="form-control  @error('notelepon') is-invalid @enderror" id="notelepon"
                                        placeholder="Masukan notelepon">
                                    @error('notelepon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nss">Nomor Statistik Sekolah (NSS) </label>
                                    <input name="nss" value="{{ old('nss', $data->nss) }}" type="number"
                                        class="form-control  @error('nss') is-invalid @enderror" id="nss"
                                        placeholder="Masukan nss">
                                    @error('nss')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Akreditasi</label>
                                    <select name="akreditasi"
                                        class="form-control @error('akreditasi') is-invalid @enderror">
                                        <option> Pilih </option>
                                        <option value="A"
                                            {{ old('akreditasi', $data->akreditasi) == 'A' ? 'selected' : null }}>A
                                        </option>
                                        <option value="B"
                                            {{ old('akreditasi', $data->akreditasi) == 'B' ? 'selected' : null }}>B
                                        </option>
                                        <option value="C"
                                            {{ old('akreditasi', $data->akreditasi) == 'C' ? 'selected' : null }}>C
                                        </option>
                                        <option value="TT"
                                            {{ old('akreditasi', $data->akreditasi) == 'TT' ? 'selected' : null }}>TT
                                        </option>
                                    </select>
                                    @error('akreditasi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
                                        placeholder="Masukan Alamat...">{{ $data->alamat }}</textarea>
                                    @error('alamat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="logo">Upload Logo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="logo" type="file" class="custom-file-input" id="logo"
                                                value="{{ old('logo') }}" class="@error('logo') is-invalid @enderror">
                                            <label class="custom-file-label" for="logo">Klik untuk mengganti
                                                logo</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        @error('logo')
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
                                <a href="{{ route('profilapps.index') }}" class="btn btn-danger">
                                    Batal
                                </a>
                            </div>
                    </div>
                    <!-- /.card-body -->
                    </form>
                </div>
                {{-- right card --}}
                <div class="col-md-4">
                    <!-- Form Element sizes -->
                    <div class="card card-secondery">
                        <div class="card-header text-center">
                            <h3 class="card-title">Logo</h3>
                        </div>
                        <div class="card-body">
                            <img src="/image/{{ $data->logo }}" width="280px" height="320px">
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- Main row -->
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
@endsection
