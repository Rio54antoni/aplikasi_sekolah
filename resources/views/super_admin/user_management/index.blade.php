@extends('master.layouts')
@section('content')
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
            <div class="card">
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
                                <th style="width: 40px">Action</th>
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
                                    <td><img src="/image/{{ $d->foto }}" width="100px" height="120px"></td>
                                    <td>

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
