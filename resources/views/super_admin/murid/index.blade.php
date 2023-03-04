@extends('master.layouts')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" data-bs-delay="5000">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                    <h1 class="m-0">Data Murid</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Murid</li>
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
                            <h3 class="card-title"> <a href="{{ route('murids.create') }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-user-plus mr-2">Tambah</i>
                                </a>
                            </h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        {{-- <th>Kontak (No.tlp/No.hp)</th> --}}
                                        <th>Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->nis }}</td>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->email }}</td>
                                            {{-- <td>{{ $d->notelepon }} / {{ $d->nohp }}</td> --}}
                                            <td>{{ \Carbon\Carbon::parse($d->tgl_lahir)->isoFormat('dddd, DD MMMM YYYY') }}
                                            </td>
                                            <td>{{ $d->agama->nama }}</td>
                                            <td>{{ $d->jeniskelamin->nama }}</td>
                                            <td><img src="/image/{{ $d->foto }}" width="75px" height="100px"></td>
                                            <td>
                                                <form class="ml-auto" action="{{ route('murids.destroy', $d->id) }}"
                                                    method="POST">

                                                    <a href="{{ route('murids.show', $d->id) }}"
                                                        class="btn btn-info btn-square btn-sm">
                                                        <i class="far fa-eye">View</i> </a>
                                                    <a href="{{ route('murids.edit', $d->id) }}"
                                                        class="btn btn-warning btn-square btn-sm">
                                                        <i class="fas fa-edit">Edit</i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data user ini ?')"><i
                                                            class="fas fa-trash">Hapus</i></button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
