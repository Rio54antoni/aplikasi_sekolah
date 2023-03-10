@extends('master.layouts')
@section('title')
    Tambah User Management
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')

    @section('content')
        <section class="content">
            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Penambahan User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input name="nama" value="{{ old('nama') }}" type="text"
                                    class="form-control  @error('nama') is-invalid @enderror" id="nama"
                                    placeholder="Masukan nama lengkap">
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input name="email" value="{{ old('email') }}" type="email"
                                    class="form-control  @error('email') is-invalid @enderror" id="email"
                                    placeholder="Masukan email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password"
                                class="form-control  @error('password') is-invalid @enderror" id="password"
                                placeholder="Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password"
                                    class="form-control  @error('password') is-invalid @enderror" id="password"
                                    placeholder="Password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password Konfirmasi</label>
                                <input name="password_confirmation" type="password"
                                    class="form-control  @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" placeholder="Password Konfirmasi">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror">
                                    <option>Pilih</option>
                                    @foreach ($role as $tipe)
                                        <option
                                            value="{{ $tipe['nama'] }}"{{ old('role') == $tipe['nama'] ? 'selected' : null }}>
                                            {{ $tipe['keterangan'] }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto">Upload Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="foto" type="file" class="custom-file-input" id="foto"
                                            value="{{ old('foto') }}" class="@error('foto') is-invalid @enderror">
                                        <label class="custom-file-label" for="foto">Choose file</label>
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
                            <a href="{{ route('users.index') }}" class="btn btn-danger">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>



                <!-- Main row -->
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
        </section>
    @endsection
    @push('js')

        <!-- bs-custom-file-input -->
        <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    @endpush
