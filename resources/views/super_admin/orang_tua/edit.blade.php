@extends('master.layouts')
@section('title')
    Edit Data Orang tua
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
                        <h3 class="card-title">Form Edit Data Orang tua</h3>
                    </div>

                    <form action="{{ route('orangtuas.update', $data->id) }}" method="POST" enctype="multipart/form-data">
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
                                <label>Hubungan</label>
                                <select name="hubungan" class="form-control @error('hubungan') is-invalid @enderror">
                                    <option>Pilih</option>
                                    @foreach ($hubungan as $ag)
                                        <option
                                            value="{{ $ag->id }}"{{ old('hubungan', $data->hubungan) == $ag->id ? 'selected' : null }}>
                                            {{ $ag->nama }}</option>
                                    @endforeach
                                </select>
                                @error('hubungan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis Pekerjaan</label>
                                <select name="id_kerja" class="form-control @error('id_kerja') is-invalid @enderror">
                                    <option>Pilih</option>
                                    @foreach ($kerja as $jenis)
                                        <option
                                            value="{{ $jenis->id }}"{{ old('id_kerja', $data->id_kerja) == $jenis->id ? 'selected' : null }}>
                                            {{ $jenis->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_kerja')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                <input name="nama_perusahaan" value="{{ old('nama_perusahaan', $data->nama_perusahaan) }}"
                                    type="text" class="form-control  @error('nama_perusahaan') is-invalid @enderror"
                                    id="nama_perusahaan" placeholder="Masukan Nama perusahaan">
                                @error('nama_perusahaan')
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
                            <a href="{{ route('orangtuas.index') }}" class="btn btn-danger">
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
                        <h3 class="card-title">Foto Orang tua</h3>
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
