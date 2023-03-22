@extends('master.layouts')
@section('title')
    Edit Data Staff
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
            <div class="col mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Data Staff</h3>
                    </div>
                    <form action="{{ route('admins.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap <span
                                                        class="text-danger">*</span></label>
                                                <input name="nama" value="{{ old('nama', $data->nama) }}" type="text"
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
                                                <input name="nik" value="{{ old('nik', $data->nik) }}" type="text"
                                                    pattern="\d+" class="form-control  @error('nik') is-invalid @enderror"
                                                    id="nik" placeholder="NIK : max 13 angka ">
                                                @error('nik')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input name="email" value="{{ old('email', $data->email) }}"
                                                    type="email"
                                                    class="form-control  @error('email') is-invalid @enderror"
                                                    id="email" placeholder="Masukan email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nohp">No.Telepon / WA</label>
                                                <input name="nohp" value="{{ old('nohp', $data->nohp) }}" type="text"
                                                    pattern="\d+" class="form-control  @error('nohp') is-invalid @enderror"
                                                    id="nohp" placeholder="Masukan no nohp">
                                                @error('nohp')
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
                                                <input name="tempat_lahir"
                                                    value="{{ old('tempat_lahir', $data->tempat_lahir) }}" type="text"
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
                                                <input name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" type="date"
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
                                                <select name="id_agama"
                                                    class="form-control @error('id_agama') is-invalid @enderror">
                                                    <option>-- Pilih Agama --</option>
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
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status Pernikahan <span class="text-danger">*</span></label>
                                                <select name="sts_pernikahan"
                                                    class="form-control @error('sts_pernikahan') is-invalid @enderror">
                                                    <option>-- Pilih Status --</option>
                                                    <option
                                                        value="Sudah menikah"{{ old('sts_pernikahan', $data->sts_pernikahan) == 'Sudah menikah' ? 'selected' : null }}>
                                                        Sudah Menikah</option>
                                                    <option
                                                        value="Belum Menikah"{{ old('sts_pernikahan', $data->sts_pernikahan) == 'Belum Menikah' ? 'selected' : null }}>
                                                        Belum Menikah</option>
                                                    <option
                                                        value="Cerai Hidup"{{ old('sts_pernikahan', $data->sts_pernikahan) == 'Cerai Hidup' ? 'selected' : null }}>
                                                        Cerai Hidup</option>
                                                    <option
                                                        value="Cerai Mati"{{ old('sts_pernikahan', $data->sts_pernikahan) == 'Cerai Mati' ? 'selected' : null }}>
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
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                        <textarea name="alamat" value="{{ old('alamat', $data->alamat) }}" type="text"
                                            class="form-control  @error('alamat') is-invalid @enderror " id="alamat" placeholder="Masukan Alamat">{{ old('alamat', $data->alamat) }}</textarea>
                                        @error('alamat')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tgl_daftar">Tanggal Daftar</label>
                                                <input name="tgl_daftar"
                                                    value="{{ old('tgl_daftar', $data->tgl_daftar) }}" type="date"
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
                                                    <option
                                                        value="SMA/SMK"{{ old('id_pendidikan', $data->id_pendidikan) == 'SMA/SMK' ? 'selected' : null }}>
                                                        SMA/SMK</option>
                                                    <option
                                                        value="Diploma III"{{ old('id_pendidikan', $data->id_pendidikan) == 'Diploma III' ? 'selected' : null }}>
                                                        Diploma III</option>
                                                    <option
                                                        value="Sarjana (S1)"{{ old('id_pendidikan', $data->id_pendidikan) == 'Sarjana (S1)' ? 'selected' : null }}>
                                                        Sarjana (S1)</option>
                                                    <option
                                                        value="Magister (S2)"{{ old('id_pendidikan', $data->id_pendidikan) == 'Magister (S2)' ? 'selected' : null }}>
                                                        Magister (S2)</option>
                                                    <option
                                                        value="Doktor (S3)"{{ old('id_pendidikan', $data->id_pendidikan) == 'Doktor (S3)' ? 'selected' : null }}>
                                                        Doktor (S3)</option>
                                                    <option
                                                        value="Sertifikasi Profesi"{{ old('id_pendidikan', $data->id_pendidikan) == 'Sertifikasi Profesi' ? 'selected' : null }}>
                                                        Sertifikasi Profesi</option>
                                                </select>
                                                @error('id_pendidikan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jabatan Pegawai <span class="text-danger">*</span></label>
                                                <select name="id_jabatan"
                                                    class="form-control @error('id_jabatan') is-invalid @enderror">
                                                    <option>-- Pilih Posisi --</option>
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
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status Kepegawaian <span class="text-danger">*</span></label>
                                                <select name="id_status"
                                                    class="form-control @error('id_status') is-invalid @enderror">
                                                    <option>-- Pilih Status --</option>
                                                    <option
                                                        value="PNS"{{ old('id_pendidikan', $data->id_status) == 'PNS' ? 'selected' : null }}>
                                                        Pegawai Negeri Sipil (PNS)</option>
                                                    <option
                                                        value="Non-PNS"{{ old('id_pendidikan', $data->id_status) == 'Non-PNS' ? 'selected' : null }}>
                                                        Pegawai Non-PNS</option>
                                                    <option
                                                        value="Honorer"{{ old('id_pendidikan', $data->id_status) == 'Honorer' ? 'selected' : null }}>
                                                        Pegawai Honorer</option>
                                                    <option
                                                        value="Tidak-tetap"{{ old('id_pendidikan', $data->id_status) == 'Tidak-tetap' ? 'selected' : null }}>
                                                        Pegawai Tidak Tetap</option>
                                                    <option
                                                        value="Magang"{{ old('id_pendidikan', $data->id_status) == 'Magang' ? 'selected' : null }}>
                                                        Pegawai Magang</option>
                                                    <option
                                                        value="Outsourcing"{{ old('id_pendidikan', $data->id_status) == 'Outsourcing' ? 'selected' : null }}>
                                                        Pegawai Outsourcing</option>
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
                                                <img class="img img-fluid " src="/image/images/{{ $data->foto_diri }}"
                                                    width="100px" height="100px" alt="User profile picture">
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
                                                <img class="img img-fluid " src="/image/images/{{ $data->foto_ktp }}"
                                                    width="100px" height="100px" alt="User profile picture">
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
                                                <img class="img img-fluid " src="/image/images/{{ $data->foto_ijazah }}"
                                                    width="100px" height="100px" alt="User profile picture">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <em>
                                * upload foto boleh dilakukan, jika ingin menganti foto yang telah disimpan atau di
                                tampilkan !!
                            </em>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('admins.index') }}" class="btn btn-danger">
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
