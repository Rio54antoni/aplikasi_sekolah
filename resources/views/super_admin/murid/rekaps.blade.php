@extends('master.layouts')
@section('title')
    Rekap Data Siswa
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@section('content')
    {{-- kalau ambaik dari section lansuang blok section t paste --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="form-group">
                                <label>Cetak Data Siswa</label>
                                <select id="pilih-data" class="form-control">
                                    <option value="">-- Pilih Cetak --</option>
                                    <option value="1">Semua data</option>
                                    <option value="2">Data Per Tanggal PDF</option>
                                    <option value="3">Data Per Tanggal Excel</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="data-terpilih">

                        </div>
                        <!-- /.card-body -->

                    </div>
                </div>
                {{-- <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Semua Data Siswa
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="muridtable" class="table table-bordered table-hover muridtable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIS</th>
                                        <th>Email</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tanggal Daftar</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div> --}}
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
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
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
                "searching": true,
                "ordering": true,
                "info": true,
                "buttons": true,
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
                        data: 'tgl_lahir',
                        name: 'tgl_lahir'
                    },
                    {
                        data: 'tgl_daftar',
                        name: 'tgl_daftar'
                    },
                ],
                deferRender: true
            });
        });
    </script>
    <script>
        // Ambil elemen selection
        const selectData = document.querySelector('#pilih-data');

        // Ambil elemen card body
        const dataTerpilih = document.querySelector('#data-terpilih');

        // Tambahkan event listener untuk selection
        selectData.addEventListener('change', () => {
            // Ambil nilai yang dipilih
            const pilihan = selectData.value;

            // Ubah isi card body sesuai dengan nilai yang dipilih
            switch (pilihan) {
                case '1':
                    dataTerpilih.innerHTML =
                        '<a href="{{ route('exportrekappdf.index') }}" target="_blank"  class="btn btn-success mb-4">Print <i class="fas fa-print"></i></a> <a href="{{ route('exportexcel.index') }}" target="_blank"  class="btn btn-success mb-4">Export Excel <i class="fas fa-file"></i></a>';
                    break;
                case '2':
                    dataTerpilih.innerHTML = `
                    <form action="{{ route('exportpdfper.index') }}" method="POST" target="_blank">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="from">Dari :</label>
                                        <input type="date" id="from" name="from" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="to">Sampai :</label>
                                        <input type="date" id="to" name="to" class="form-control">
                                    </div>
                                    &nbsp;
                                    <div class="btn mt-4">
                                        <button type="submit" class="btn btn-success" >Print <i class="fas fa-print"></i></button>
                                    </div>
                                </div>
                            </form>
                `;
                    break;
                case '3':
                    dataTerpilih.innerHTML = `
                    <form action="{{ route('exportexcelper.index') }}" method="POST" target="_blank">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="from">Dari :</label>
                                        <input type="date" id="from" name="from" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="to">Sampai :</label>
                                        <input type="date" id="to" name="to" class="form-control">
                                    </div>
                                    &nbsp;
                                    <div class="btn mt-4">
                                        <button type="submit" class="btn btn-success">Export Excel <i class="fas fa-file"></i></button>
                                    </div>
                                </div>
                            </form>
                    `;
                    break;
                default:
                    dataTerpilih.innerHTML = 'Pilih data terlebih dahulu';
                    break;
            }
        });
    </script>
@endpush
