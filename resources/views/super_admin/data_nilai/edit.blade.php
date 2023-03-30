@extends('master.layouts')
@section('title')
    Edit Nilai Siswa
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
@endpush
@section('content')
    {{-- kalau ambaik dari section lansuang blok section t paste --}}

    <section class="content">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="card card-primary mt-2">
                    <div class="card-header">
                        <h3 class="card-title">Form Input Nilai</h3>
                    </div>
                    <form action="{{ route('nilais.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kelas<span class="text-danger">*</span></label>
                                        <select name="id_kelas"
                                            class="form-control @error('id_kelas') is-invalid @enderror">
                                            <option>-- Pilih Kelas --</option>
                                            @foreach ($kelas as $kel)
                                                <option
                                                    value="{{ $kel->id }}"{{ old('id_kelas', $data->id_kelas) == $kel->id ? 'selected' : null }}>
                                                    {{ $kel->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_kelas')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Siswa<span class="text-danger">*</span></label>
                                        <select name="id_siswa"
                                            class="form-control @error('id_siswa') is-invalid @enderror">
                                            <option>-- Pilih Siswa --</option>
                                            @foreach ($siswa as $rid)
                                                <option
                                                    value="{{ $rid->id }}"{{ old('id_siswa', $data->id_siswa) == $rid->id ? 'selected' : null }}>
                                                    {{ $rid->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_siswa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="absensi">Nilai Absensi<span
                                                        class="text-danger">*</span></label>
                                                <input name="absensi" value="{{ old('absensi', $data->absensi) }}"
                                                    type="number"
                                                    class="form-control  @error('absensi') is-invalid @enderror"
                                                    id="absensi">
                                                @error('absensi')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nilai_uas">Nilai UAS<span class="text-danger">*</span></label>
                                                <input name="nilai_uas" value="{{ old('nilai_uas', $data->nilai_uas) }}"
                                                    type="number"
                                                    class="form-control  @error('nilai_uas') is-invalid @enderror"
                                                    id="nilai_uas">
                                                @error('nilai_uas')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nilai_tugas">Nilai Tugas<span class="text-danger">*</span></label>
                                            <input name="nilai_tugas" value="{{ old('nilai_tugas', $data->nilai_tugas) }}"
                                                type="number"
                                                class="form-control  @error('nilai_tugas') is-invalid @enderror"
                                                id="nilai_tugas">
                                            @error('nilai_tugas')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tahun Ajaran<span class="text-danger">*</span></label>
                                        <select name="id_tahun"
                                            class="form-control @error('id_tahun') is-invalid @enderror">
                                            <option>-- Pilih Tahun Ajaran --</option>
                                            @foreach ($tahun_ajar as $tah)
                                                <option
                                                    value="{{ $tah->id }}"{{ old('id_tahun', $data->id_tahun) == $tah->id ? 'selected' : null }}>
                                                    {{ $tah->tahun }} {{ $tah->semester }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_tahun')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mata Pelajaran<span class="text-danger">*</span></label>
                                        <select name="id_mapel"
                                            class="form-control @error('id_mapel') is-invalid @enderror">
                                            <option>-- Pilih Mata pelajaran --</option>
                                            @foreach ($mapel as $map)
                                                <option
                                                    value="{{ $map->id }}"{{ old('id_mapel', $data->id_mapel) == $map->id ? 'selected' : null }}>
                                                    {{ $map->nama }} {{ $map->semester }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_mapel')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nilai_ulangan">Nilai Quiz<span
                                                        class="text-danger">*</span></label>
                                                <input name="nilai_ulangan"
                                                    value="{{ old('nilai_ulangan', $data->nilai_ulangan) }}" type="number"
                                                    class="form-control  @error('nilai_ulangan') is-invalid @enderror"
                                                    id="nilai_ulangan">
                                                @error('nilai_ulangan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nilai_uts">Nilai UTS<span class="text-danger">*</span></label>
                                            <input name="nilai_uts" value="{{ old('nilai_uts', $data->nilai_uts) }}"
                                                type="number"
                                                class="form-control  @error('nilai_uts') is-invalid @enderror"
                                                id="nilai_uts">
                                            @error('nilai_uts')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('nilais.index') }}" class="btn btn-danger">
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
@endpush
