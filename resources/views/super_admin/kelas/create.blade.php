@extends('master.layouts')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kelas / Tambah</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- kalau ambaik dari section lansuang blok section t paste --}}

    <section class="content">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Input Kelas</h3>
                    </div>

                    <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Kelas</label>
                                <input name="nama" value="{{ old('nama') }}" type="text"
                                    class="form-control  @error('nama') is-invalid @enderror" id="nama"
                                    placeholder="Masukan Nama Kelas">
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Wali Kelas</label>
                                <select name="id_wali" class="form-control @error('id_wali') is-invalid @enderror">
                                    <option>Pilih</option>
                                    @foreach ($wali as $ag)
                                        <option
                                            value="{{ $ag->id }}"{{ old('id_wali') == $ag->id ? 'selected' : null }}>
                                            {{ $ag->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_wali')
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
                            <a href="{{ route('super_admin.index') }}" class="btn btn-danger">
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
