@extends('master.layouts')
@section('title')
    Tambah Jadwal Pembelajaran
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Input Jadwal Pelajaran</h3>
                    </div>
                    <form action="{{ route('jadwals.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Hari</label>
                                <select name="hari" class="form-control @error('hari') is-invalid @enderror">
                                    <option> Pilih </option>
                                    <option value="Senin" {{ old('hari') == 'Senin' ? 'selected' : null }}>
                                        Senin
                                    </option>
                                    <option value="Selasa" {{ old('hari') == 'Selasa' ? 'selected' : null }}>
                                        Selasa
                                    </option>
                                    <option value="Rabu" {{ old('hari') == 'Rabu' ? 'selected' : null }}>Rabu
                                    </option>
                                    <option value="Kamis" {{ old('hari') == 'Kamis' ? 'selected' : null }}>
                                        Kamis
                                    </option>
                                    <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : null }}>
                                        Jumat
                                    </option>
                                    <option value="Sabtu" {{ old('hari') == 'Sabtu' ? 'selected' : null }}>
                                        Sabtu
                                    </option>
                                </select>
                                @error('hari')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <label for="">Waktu Pelajaran</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Jam Mulai</p>
                                        <input name="jam_mulai" value="{{ old('jam_mulai') }}" type="time"
                                            class="form-control @error('jam_mulai') is-invalid @enderror" placeholder="">
                                        @error('jam_mulai')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Jam Berakhir</p>
                                        <input name="jam_selesai" value="{{ old('jam_selesai') }}" type="time"
                                            class="form-control @error('jam_selesai') is-invalid @enderror" placeholder="">
                                        @error('jam_selesai')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Kelas</label>
                                <select multiple name="id_kelas"
                                    class="form-control @error('id_kelas') is-invalid @enderror">
                                    <option>Pilih</option>
                                    @foreach ($kel as $k)
                                        <option
                                            value="{{ $k->id }}"{{ old('id_kelas') == $k->id ? 'selected' : null }}>
                                            {{ $k->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_kelas')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <select multiple name="id_mapel"
                                    class="form-control @error('id_mapel') is-invalid @enderror">
                                    <option>Pilih</option>
                                    @foreach ($matap as $tap)
                                        <option
                                            value="{{ $tap->id }}"{{ old('id_mapel') == $tap->id ? 'selected' : null }}>
                                            {{ $tap->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_mapel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                            &nbsp;
                            <a href="{{ route('jadwals.index') }}" class="btn btn-danger">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
