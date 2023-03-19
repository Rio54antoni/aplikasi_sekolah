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
                                    <option>-- Pilih hari --</option>
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

                            <div class="form-group">
                                <label>Jam Ke</label>
                                <select name="jam" class="form-control @error('jam') is-invalid @enderror">
                                    <option>-- Pilih jam pelajaran--</option>
                                    <option value="1" {{ old('jam') == '1' ? 'selected' : null }}>
                                        1
                                    </option>
                                    <option value="2" {{ old('jam') == '2' ? 'selected' : null }}>
                                        2
                                    </option>
                                    <option value="3" {{ old('jam') == '3' ? 'selected' : null }}>3
                                    </option>
                                    <option value="4" {{ old('jam') == '4' ? 'selected' : null }}>
                                        4
                                    </option>
                                    <option value="5" {{ old('jam') == '5' ? 'selected' : null }}>
                                        5
                                    </option>
                                    <option value="6" {{ old('jam') == '6' ? 'selected' : null }}>
                                        6
                                    </option>
                                    <option value="7" {{ old('jam') == '7' ? 'selected' : null }}>
                                        7
                                    </option>
                                    <option value="8" {{ old('jam') == '8' ? 'selected' : null }}>
                                        8
                                    </option>
                                    <option value="9" {{ old('jam') == '9' ? 'selected' : null }}>9
                                    </option>
                                </select>
                                @error('jam')
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
                                <label>Kelas <span class="text-danger">*</span></label>
                                <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror">
                                    <option>-- Pilih kelas --</option>
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
                                <label>Mata Pelajaran <span class="text-danger">*</span></label>
                                <select name="id_mapel" class="form-control @error('id_mapel') is-invalid @enderror">
                                    <option>-- Pilih mata Pelajaran --</option>
                                    @foreach ($matap as $ag)
                                        <option
                                            value="{{ $ag->id }}"{{ old('id_mapel') == $ag->id ? 'selected' : null }}>
                                            {{ $ag->nama }}</option>
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
