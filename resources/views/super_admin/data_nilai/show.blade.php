@extends('master.layouts')
@section('title')
    Data Nilai {{ $data->murid->nama }}
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
                <div class="card card-light mt-2">
                    <div class="card-header">
                        <h3 class="card-title">Data Nilai {{ $data->murid->nama }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Kelas : </label> {{ $data->kelas->nama }}
                                    <br>
                                    <label>Nama : </label> {{ $data->murid->nama }}
                                    <br>
                                    <label>Nama : </label> {{ $data->murid->nis }}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Tahun Ajaran : </label> {{ $data->tahun->tahun }}, {{ $data->tahun->semester }}
                                    <br>
                                    <label>Mata Pelajaran : </label> {{ $data->mapel->nama }}
                                    <br>
                                    <label>Guru Pengampu : </label> {{ $data->mapel->mapel->nama }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-center">
                            <div class="form-group">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Penilaian</th>
                                            <th class="text-center">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="">Absensi Kehadiran</td>
                                            <td class="text-center">{{ $data->absensi }}</td>
                                        </tr>
                                        <tr>
                                            <td class="">Nilai Tugas dan Latihan</td>
                                            <td class="text-center">{{ $data->nilai_tugas }}</td>
                                        </tr>
                                        <tr>
                                            <td class="">Nilai Quiz</td>
                                            <td class="text-center">{{ $data->nilai_ulangan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="">Nilai Ujian Tengah Semester (UTS)</td>
                                            <td class="text-center">{{ $data->nilai_uts }}</td>
                                        </tr>
                                        <tr>
                                            <td class="">Nilai Ujian Akhir Semester (UAS)</td>
                                            <td class="text-center">{{ $data->nilai_uas }}</td>
                                        </tr>
                                        @php
                                            $absen = $data->absensi;
                                            $tugas = $data->nilai_tugas;
                                            $ulangan = $data->nilai_ulangan;
                                            $uts = $data->nilai_uts;
                                            $uas = $data->nilai_uas;
                                            //total
                                            $total = $absen + $tugas + $ulangan + $uts + $uas;
                                            //rata-rata
                                            $ratarata = $total / 5;
                                            
                                            if ($ratarata >= 89) {
                                                $huruf = 'A';
                                                $ket = 'Sangat Baik';
                                            } elseif ($ratarata >= 77) {
                                                $huruf = 'B';
                                                $ket = 'Baik';
                                            } elseif ($ratarata >= 64) {
                                                $huruf = 'C';
                                                $ket = 'Cukup';
                                            } elseif ($ratarata >= 15) {
                                                $huruf = 'D';
                                                $ket = 'Kurang';
                                            } elseif ($ratarata >= 0) {
                                                $huruf = 'E';
                                                $ket = 'Gagal';
                                            }
                                        @endphp
                                        <tr>
                                            <td class="text-center"><strong>Total Nilai</strong></td>
                                            <td class="text-center">{{ $total }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><strong>Rata-rata</strong></td>
                                            <td class="text-center">{{ $ratarata }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="text-center"><strong>KKM</strong></td>
                                            <td class="text-center">77</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><strong>Predikat</strong></td>
                                            <td class="text-center">{{ $huruf }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" colspan="2"><strong>Keterangan  :
                                                    {{ $ket }}</strong></td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('nilais.index') }}" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
