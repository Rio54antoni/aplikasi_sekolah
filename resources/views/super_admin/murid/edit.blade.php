@extends('master.layouts')
@section('title')
    Edit Murid
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
    {{-- kalau ambaik dari section lansuang blok section t paste --}}
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Data Murid</h3>
                    </div>
                    <form action="{{ route('murids.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
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
                                        <label>Agama</label>
                                        <select name="id_agama"
                                            class="form-control @error('id_agama') is-invalid @enderror">
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
                                        <label for="email">Email address</label>
                                        <input name="email" value="{{ old('email', $data->email) }}" type="email"
                                            class="form-control  @error('email') is-invalid @enderror" id="email"
                                            placeholder="Masukan email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input name="tempat_lahir" value="{{ old('tempat_lahir', $data->tempat_lahir) }}"
                                            type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror"
                                            id="tempat_lahir" placeholder="Masukan tempat lahir">
                                        @error('tempat_lahir')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nis">NIS</label>
                                        <input name="nis" value="{{ old('nis', $data->nis) }}" type="number"
                                            class="form-control  @error('nis') is-invalid @enderror" id="nis"
                                            placeholder="Masukan Nis">
                                        @error('nis')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin"
                                            class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                            <option>-- Pilih Kelamin --</option>
                                            <option
                                                value="Laki-laki"{{ old('jenis_kelamin', $data->jenis_kelamin) == 'Laki-laki' ? 'selected' : null }}>
                                                Laki-laki</option>
                                            <option
                                                value="Perempuan"{{ old('jenis_kelamin', $data->jenis_kelamin) == 'Perempuan' ? 'selected' : null }}>
                                                Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
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
                                        <input name="tgl_lahir" value="{{ old('tgl_lahir', $data->tgl_lahir) }}"
                                            type="date" class="form-control  @error('tgl_lahir') is-invalid @enderror"
                                            id="tgl_lahir">
                                        @error('tgl_lahir')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" value="" type="text" class="form-control  @error('alamat') is-invalid @enderror"
                                    id="alamat" placeholder="Masukan Alamat">{{ old('alamat', $data->alamat) }}</textarea>
                                @error('alamat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ayah">Ayah</label>
                                        <input name="ayah" value="{{ old('ayah', $data->ayah) }}" type="text"
                                            class="form-control  @error('ayah') is-invalid @enderror" id="ayah"
                                            placeholder="Masukan nama ayah">
                                        @error('ayah')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="ibu">Ibu</label>
                                        <input name="ibu" value="{{ old('ibu', $data->ibu) }}" type="text"
                                            class="form-control  @error('ibu') is-invalid @enderror" id="ibu"
                                            placeholder="Masukan nama ibu">
                                        @error('ibu')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="wali">Wali</label>
                                        <input name="wali" value="{{ old('wali', $data->wali) }}" type="text"
                                            class="form-control  @error('wali') is-invalid @enderror" id="wali"
                                            placeholder="Masukan nama wali">
                                        @error('wali')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp_ortu">kontak orang tua</label>
                                        <input name="nohp_ortu" value="{{ old('nohp_ortu', $data->nohp_ortu) }}"
                                            type="number" class="form-control @error('nohp_ortu') is-invalid @enderror"
                                            id="nohp_ortu" placeholder="Masukan No Hp orang tua murid">
                                        @error('nohp_ortu')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pekerjaan ayah</label>
                                        <select name="kerja_ayah"
                                            class="form-control @error('kerja_ayah') is-invalid @enderror">
                                            <option>-- Pilih pekerjaan --</option>
                                            @foreach ($kerja as $ker)
                                                <option
                                                    value="{{ $ker->id }}"{{ old('kerja_ayah', $data->kerja_ayah) == $ker->id ? 'selected' : null }}>
                                                    {{ $ker->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('kerja_ayah')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan ibu</label>
                                        <select name="kerja_ibu"
                                            class="form-control @error('kerja_ibu') is-invalid @enderror">
                                            <option>-- Pilih pekerjaan --</option>
                                            @foreach ($kerja as $ker)
                                                <option
                                                    value="{{ $ker->id }}"{{ old('kerja_ibu', $data->kerja_ibu) == $ker->id ? 'selected' : null }}>
                                                    {{ $ker->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('kerja_ibu')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan wali</label>
                                        <select name="kerja_wali"
                                            class="form-control @error('kerja_wali') is-invalid @enderror">
                                            <option>-- Pilih pekerjaan --</option>
                                            @foreach ($kerja as $ker)
                                                <option
                                                    value="{{ $ker->id }}"{{ old('kerja_wali', $data->kerja_wali) == $ker->id ? 'selected' : null }}>
                                                    {{ $ker->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('kerja_wali')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="foto_diri">Upload foto murid</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="foto_diri" type="file" class="custom-file-input"
                                                    id="foto_diri" value="{{ old('foto_diri') }}"
                                                    class="@error('foto_diri') is-invalid @enderror">{{ old('foto_diri') }}
                                                <label class="custom-file-label" for="foto_diri"></label>
                                            </div>
                                            @error('foto_diri')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('murids.index') }}" class="btn btn-danger">
                                Batal
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header float-center">
                        <h3 class="card-title">Foto Murid</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="/image/images/{{ $data->foto_diri }} " class="img-fluid mb-2"
                                alt="black sample" />
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
