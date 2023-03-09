@extends('master.layouts')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
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
                                    &nbsp;
                                    <a href="{{ route('super_admin.index') }}" class="btn btn-sm btn-secondary">
                                        kembali
                                    </a>
                                </h3>
                                <div class="card-tools">
                                    <form method="GET" action="{{ route('murids.index') }}">
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
                            <div class="card-body">
                                <table class="table table-bordered table-hover muridtable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIS</th>
                                            <th>Email</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
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
    {{-- bagian javascript --}}
    @push('js')
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <script type="text/javascript">
            function confirmDelete() {
                if (!confirm("Yakin Ingin Menghapus Data ini ??"))
                    event.preventDefault();
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.muridtable').DataTable({
                    processing: true,
                    serverSide: true,
                    "paging": true,
                    "lengthChange": false,
                    // "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    ajax: "{{ route('murids.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'nis',
                            name: 'nis'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'id_jk',
                            name: 'id_jk'
                        },
                        {
                            data: 'tgl_lahir',
                            name: 'tgl_lahir'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            className: "text-center",
                            orderable: false,
                            searchable: false
                        },

                    ],
                    deferRender: true
                });
            });
        </script>
    @endpush
