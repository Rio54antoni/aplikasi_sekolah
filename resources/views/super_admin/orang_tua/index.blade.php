@extends('master.layouts')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" data-bs-delay="5000">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ $message }}
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.alert').classList.add('fade');
                document.querySelector('.alert button').click();
            }, 5000);
        </script>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Orang Tua</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Orang Tua</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- kalau ambaik dari section lansuang blok section t paste --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> <a href="{{ route('orangtuas.create') }}"
                                    class="btn btn-sm btn-success">
                                    <i class="fas fa-user-plus mr-2">Tambah</i>
                                </a>
                            </h3>
                            &nbsp;
                            <a href="{{ route('super_admin.index') }}" class="btn btn-sm btn-secondary">
                                kembali
                            </a>
                            <div class="card-tools">
                                <form method="GET" action="{{ route('orangtuas.index') }}">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="keyword" value="{{ old('keyword') }}"
                                            class="form-control float-right" placeholder="Cari ...">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Hubungan</th>
                                        <th>Pekerjaan</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->email }}</td>
                                            {{-- <td>{{ $d->notelepon }} / {{ $d->nohp }}</td> --}}
                                            </td>
                                            <td>{{ $d->hubungan1->nama }}</td>
                                            <td>{{ $d->kerja->nama }}</td>
                                            <td><img src="/image/{{ $d->foto }}" width="55px" height="70px"></td>
                                            <td>
                                                <form class="ml-auto" action="{{ route('orangtuas.destroy', $d->id) }}"
                                                    method="POST">

                                                    <a href="{{ route('orangtuas.show', $d->id) }}"
                                                        class="btn btn-info btn-square btn-sm">
                                                        <i class="far fa-eye">View</i> </a>
                                                    <a href="{{ route('orangtuas.edit', $d->id) }}"
                                                        class="btn btn-warning btn-square btn-sm">
                                                        <i class="fas fa-edit">Edit</i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data murid ini ?')"><i
                                                            class="fas fa-trash">Hapus</i></button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div class="d-flex">
                                {!! $data->links() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
