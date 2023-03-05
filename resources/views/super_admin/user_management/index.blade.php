@extends('master.layouts')
@section('content')
    {{-- notifikasi tindakan --}}
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
    {{-- end notifikasi --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Management</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <!-- /.row -->
            <!-- /.row -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tabel User</h3>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="{{ route('users.create') }}" class="btn btn-success">
                            <i class="fas fa-user-plus mr-2"></i> Tambah User
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Foto</th>
                                <th style="width: 225px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n = 1;
                            @endphp
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $n++ }}.</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->role }}</td>
                                    <td><img src="/image/{{ $d->foto }}" width="75px" height="100px"></td>
                                    <td>
                                        <form class="ml-auto" action="{{ route('users.destroy', $d->id) }}" method="POST">
                                            <a href="{{ route('users.show', $d->id) }}"
                                                class="btn btn-info btn-square btn-sm">
                                                <i class="far fa-eye">View</i> </a>
                                            <a href="{{ route('users.edit', $d->id) }}"
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
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>




            <!-- Main row -->
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
@endsection
