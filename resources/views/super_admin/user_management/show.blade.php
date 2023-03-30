@extends('master.layouts')
@section('title')
    Lihat User Management
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')

    @section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 offset-md-4">

                        <!-- Profile Image -->
                        <div class="card card-light card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="img img-fluid " src="/image/{{ $data->foto }}" width="100px" height="100px"
                                        alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{ $data->nama }}</h3>

                                <p class="text-muted text-center">{{ $data->email }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <p class="text-muted text-center">Jabatan : {{ $data->role }}</p>
                                    </li>
                                </ul>

                                <a href="{{ route('users.index') }}" class="btn btn-dark btn-block"><b>Kembali</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    @endsection
