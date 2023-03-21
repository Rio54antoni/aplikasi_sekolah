@extends('master.layouts')
@section('title')
    Tambah Pegawai
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
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col mx-auto">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Input Data Pegawai</h3>
                    </div>
                    <form action="{{ route('pegawais.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap <span
                                                        class="text-danger">*</span></label>
                                                <input name="nama" value="{{ old('nama') }}" type="text"
                                                    class="form-control  @error('nama') is-invalid @enderror" id="nama"
                                                    placeholder="Masukan nama lengkap">
                                                @error('nama')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nik">NIK<span class="text-danger">*</span></label>
                                                <input name="nik" value="{{ old('nik') }}" type="text"
                                                    pattern="\d+" class="form-control  @error('nik') is-invalid @enderror"
                                                    id="nik" placeholder="nik: max 13 angka ">
                                                @error('nik')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email address<span
                                                        class="text-danger">*</span></label>
                                                <input name="email" value="{{ old('email') }}" type="email"
                                                    class="form-control  @error('email') is-invalid @enderror"
                                                    id="email" placeholder="Masukan email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telpon">No. Telpon / WA<span
                                                        class="text-danger">*</span></label>
                                                <input name="telpon" value="{{ old('telpon') }}" type="text"
                                                    pattern="\d+"
                                                    class="form-control  @error('telpon') is-invalid @enderror"
                                                    id="telpon" placeholder="Contoh : 0813XXXXXXXX">
                                                @error('telpon')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir <span
                                                        class="text-danger">*</span></label>
                                                <input name="tempat_lahir" value="{{ old('tempat_lahir') }}" type="text"
                                                    class="form-control  @error('tempat_lahir') is-invalid @enderror"
                                                    id="tempat_lahir" placeholder="Masukan tempat lahir">
                                                @error('tempat_lahir')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir <span
                                                        class="text-danger">*</span></label>
                                                <input name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                                    type="date"
                                                    class="form-control  @error('tanggal_lahir') is-invalid @enderror"
                                                    id="tanggal_lahir">
                                                @error('tanggal_lahir')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Agama <span class="text-danger">*</span></label>
                                                <select name="agama"
                                                    class="form-control @error('agama') is-invalid @enderror">
                                                    <option>-- Pilih Agama --</option>
                                                    @foreach ($agama as $ag)
                                                        <option
                                                            value="{{ $ag->id }}"{{ old('agama') == $ag->id ? 'selected' : null }}>
                                                            {{ $ag->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('agama')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status Pernikahan <span class="text-danger">*</span></label>
                                                <select name="sts_pernikahan"
                                                    class="form-control @error('sts_pernikahan') is-invalid @enderror">
                                                    <option>-- Pilih Status --</option>
                                                    <option
                                                        value="Sudah menikah"{{ old('sts_pernikahan') == 'Sudah Menikah' ? 'selected' : null }}>
                                                        Sudah Menikah</option>
                                                    <option
                                                        value="Belum Menikah"{{ old('sts_pernikahan') == 'Belum Menikah' ? 'selected' : null }}>
                                                        Belum Menikah</option>
                                                    <option
                                                        value="Cerai Hidup"{{ old('sts_pernikahan') == 'Cerai Hidup' ? 'selected' : null }}>
                                                        Cerai Hidup</option>
                                                    <option
                                                        value="Cerai Mati"{{ old('sts_pernikahan') == 'Cerai Mati' ? 'selected' : null }}>
                                                        Cerai Mati</option>
                                                </select>
                                                @error('sts_pernikahan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                                <select name="jenis_kelamin"
                                                    class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                    <option>-- Pilih L/P --</option>
                                                    <option
                                                        value="Laki-laki"{{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : null }}>
                                                        Laki-laki</option>
                                                    <option
                                                        value="Perempuan"{{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : null }}>
                                                        Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                        <textarea name="alamat" value="{{ old('alamat') }}" type="text"
                                            class="form-control  @error('alamat') is-invalid @enderror " id="alamat" placeholder="Masukan Alamat">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nip">NIP<span class="text-danger">*</span></label>
                                                <input name="nip" value="{{ old('nip') }}" type="text"
                                                    pattern="\d+"
                                                    class="form-control  @error('nip') is-invalid @enderror"
                                                    id="nip" placeholder="nip: max 9 angka">
                                                @error('nip')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tgl_daftar">Tanggal Daftar<span
                                                        class="text-danger">*</span></label>
                                                <input name="tgl_daftar" value="{{ old('tgl_daftar') }}" type="date"
                                                    class="form-control  @error('tgl_daftar') is-invalid @enderror"
                                                    id="tgl_daftar">
                                                @error('tgl_daftar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pendidikan Terakhir <span class="text-danger">*</span></label>
                                                <select name="id_pendidikan"
                                                    class="form-control @error('id_pendidikan') is-invalid @enderror">
                                                    <option>-- Pilih Pendidikan --</option>
                                                    <option value="SMA/SMK">SMA/SMK</option>
                                                    <option value="Diploma III">Diploma III</option>
                                                    <option value="Sarjana (S1)">Sarjana (S1)</option>
                                                    <option value="Magister (S2)">Magister (S2)</option>
                                                    <option value="Doktor (S3)">Doktor (S3)</option>
                                                    <option value="Sertifikasi Profesi">Sertifikasi Profesi</option>
                                                </select>
                                                @error('id_pendidikan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gelar">Gelar<span class="text-danger">*</span></label>
                                                <input name="gelar" value="{{ old('gelar') }}" type="text"
                                                    class="form-control  @error('gelar') is-invalid @enderror"
                                                    id="gelar" placeholder="contoh : S.Kom">
                                                @error('gelar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="npwp">NPWP</label>
                                                <input name="npwp" value="{{ old('npwp') }}" type="text"
                                                    pattern="\d+"
                                                    class="form-control  @error('npwp') is-invalid @enderror"
                                                    id="npwp" placeholder="npwp: max 9 angka">
                                                @error('npwp')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jabatan Pegawai <span class="text-danger">*</span></label>
                                                <select name="id_jabatan"
                                                    class="form-control @error('id_jabatan') is-invalid @enderror">
                                                    <option>-- Pilih Posisi --</option>
                                                    @foreach ($jabatan as $jab)
                                                        <option
                                                            value="{{ $jab->id }}"{{ old('id_jabatan') == $jab->id ? 'selected' : null }}>
                                                            {{ $jab->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_jabatan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status Kepegawaian <span class="text-danger">*</span></label>
                                                <select name="id_status"
                                                    class="form-control @error('id_status') is-invalid @enderror">
                                                    <option>-- Pilih Status --</option>
                                                    <option value="PNS">Pegawai Negeri Sipil (PNS)</option>
                                                    <option value="Non-PNS">Pegawai Non-PNS</option>
                                                    <option value="Honorer">Pegawai Honorer</option>
                                                    <option value="Tidak-tetap">Pegawai Tidak Tetap</option>
                                                    <option value="Magang">Pegawai Magang</option>
                                                    <option value="Outsourcing">Pegawai Outsourcing</option>
                                                </select>
                                                @error('id_status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="foto_diri">Upload Foto Pegawai <span
                                                        class="text-danger">*</span></label>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="foto_ktp">Upload Foto KTP <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input name="foto_ktp" type="file" class="custom-file-input"
                                                            id="foto_ktp" value="{{ old('foto_ktp') }}"
                                                            class="@error('foto_ktp') is-invalid @enderror">{{ old('foto_ktp') }}
                                                        <label class="custom-file-label" for="foto_ktp"></label>
                                                    </div>
                                                    @error('foto_ktp')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="foto_ijazah">Upload Foto Ijazah <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input name="foto_ijazah" type="file"
                                                            class="custom-file-input" id="foto_ijazah"
                                                            value="{{ old('foto_ijazah') }}"
                                                            class="@error('foto_ijazah') is-invalid @enderror">{{ old('foto_ijazah') }}
                                                        <label class="custom-file-label" for="foto_ijazah"></label>
                                                    </div>
                                                    @error('foto_ijazah')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="foto_npwp">Upload Foto NPWP</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input name="foto_npwp" type="file" class="custom-file-input"
                                                            id="foto_npwp" value="{{ old('foto_npwp') }}"
                                                            class="@error('foto_npwp') is-invalid @enderror">{{ old('foto_npwp') }}
                                                        <label class="custom-file-label" for="foto_npwp"></label>
                                                    </div>
                                                    @error('foto_npwp')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('pegawais.index') }}" class="btn btn-danger">
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
        </div>
    </section>
    <!-- /.content -->
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
