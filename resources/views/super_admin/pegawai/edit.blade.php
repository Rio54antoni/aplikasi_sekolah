@extends('master.layouts')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pegawai / Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- kalau ambaik dari section lansuang blok section t paste --}}

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Data Pegawai</h3>
                    </div>

                    <form action="{{ route('pegawais.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input name="nama" value="{{ old('nama', $data->nama) }}" type="text"
                                    class="form-control  @error('nama') is-invalid @enderror" id="nama"
                                    placeholder="Masukan Nama lengkap">
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input name="nip" value="{{ old('nip', $data->nip) }}" type="number"
                                    class="form-control  @error('nip') is-invalid @enderror" id="nip"
                                    placeholder="Masukan Nip">
                                @error('nip')
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
                                <label for="notelepon">No. Telepon</label>
                                <input name="notelepon" value="{{ old('notelepon', $data->notelepon) }}" type="number"
                                    class="form-control  @error('notelepon') is-invalid @enderror" id="notelepon"
                                    placeholder="Masukan No Telepon">
                                @error('notelepon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nohp">No. Hp</label>
                                <input name="nohp" value="{{ old('nohp', $data->nohp) }}" type="number"
                                    class="form-control  @error('nohp') is-invalid @enderror" id="nohp"
                                    placeholder="Masukan No Hp">
                                @error('nohp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input name="tgl_lahir" value="{{ old('tgl_lahir', $data->tgl_lahir) }}" type="date"
                                    class="form-control  @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir">
                                {{ $data->tgl_lahir }}
                                @error('tgl_lahir')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <select name="id_agama" class="form-control @error('id_agama') is-invalid @enderror">
                                    <option>Pilih</option>
                                    @foreach ($agama as $ag)
                                        <option
                                            value="{{ $ag->id }}"{{ old('id_agama', $data->id_agama) == $ag->id ? 'selected' : null }}>
                                            {{ $ag->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_agama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="id_jk" class="form-control @error('id_jk') is-invalid @enderror">
                                    <option>Pilih</option>
                                    @foreach ($jk as $jenis)
                                        <option
                                            value="{{ $jenis->id }}"{{ old('id_jk', $data->id_jk) == $jenis->id ? 'selected' : null }}>
                                            {{ $jenis->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_jk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="id_jabatan" class="form-control @error('id_jabatan') is-invalid @enderror">
                                    <option>Pilih</option>
                                    @foreach ($jabatan as $jab)
                                        <option
                                            value="{{ $jab->id }}"{{ old('id_jabatan', $data->id_jabatan) == $jab->id ? 'selected' : null }}>
                                            {{ $jab->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_jabatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" value="" type="text" class="form-control  @error('alamat') is-invalid @enderror"
                                    id="alamat" placeholder="Masukan Alamat">{{ old('alamat', $data->alamat) }}</textarea>
                                @error('alamat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto">Upload Ganti Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="foto" type="file" class="custom-file-input" id="foto"
                                            value="{{ old('foto') }}" class="@error('foto') is-invalid @enderror">
                                        <label class="custom-file-label" for="foto">Ganti Foto</label>
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
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                            &nbsp;
                            <a href="{{ route('pegawais.index') }}" class="btn btn-danger">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header float-center">
                        <h3 class="card-title">Foto Pegawai</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class=" img-fluid" src="/image/{{ $data->foto }} " height="120px">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
