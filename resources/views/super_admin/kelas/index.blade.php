@extends('master.layouts')
@section('title')
    Data Kelas
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@section('content')
    @if ($message = Session::get('success'))
    @endif

    {{-- kalau ambaik dari section lansuang blok section t paste --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary tambah" data-toggle="modal"><i
                                    class="fas fa-chalkboard-teacher mr-2">+</i>
                            </button>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover kelastable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Wali kelas</th>
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

    <!-- Modal Tambah Jadwal -->
    <div class="modal fade" id="tambahKelasModal" tabindex="-1" role="dialog" aria-labelledby="tambahKelasModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKelasModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Tambah Jadwal -->
                    <form id="formTambahKelas">
                        <input type="hidden" name="dataId" id="dataId" value="">

                        <div class="form-group">
                            <label for="nama">Nama Kelas</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="">
                            @error('nama')
                                <div class="invalid-feedback" id="nama_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_wali">Wali Kelas</label>
                            <select name="id_wali" id="id_wali"
                                class="form-control @error('id_wali') is-invalid @enderror" required>
                                <option value="">-- Pilih wali kelas --</option>
                                @foreach ($waliklas as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_wali')
                                <div class="invalid-feedback" id="wali_error">{{ $message }}</div>
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                    <!-- End Form Tambah Jadwal -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="batal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSimpanKelas">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah kelas -->

    <!-- MULAI MODAL KONFIRMASI DELETE-->
    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" aria-labelledby="konfirmasi-modal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PERHATIAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Jika menghapus Kelas</b></p>
                    <p>*data yang terkoneksi akan error, apakah anda yakin?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- bagian javascript --}}
@push('js')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.kelastable').DataTable({
                processing: true,
                serverSide: true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                ajax: "{{ route('kelas.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'id_kelas',
                        name: 'id_kelas',
                        defaultContent: 'Belum di pilih'
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

            //tambah
            $(document).on('click', '.tambah', function() {
                $('#tambahKelasModalLabel').html("Tambah Kelas Baru");
                $('#tambahKelasModal').modal('show');

                $("#dataId").val('');
            });
            // batal tambah
            $(document).on('click', '#batal', function() {
                $("#nama").val("");
                $("#id_wali").val("");
                $("#nama").removeClass('is-invalid');
                $("#nama_error").text('');
                $("#id_wali").removeClass('is-invalid');
                $("#wali_error").text('');
            });
            //edit
            $(document).on('click', '.editupdate', function() {
                var dataId = $(this).data('id');
                // metode get berikut digunakan saat button klik berada pada controller
                $.get("{{ route('kelas.edit', ':id') }}".replace(':id', dataId), function(data) {
                    $('#tambahKelasModal').modal('show');
                    $('#tambahKelasModalLabel').html("Edit Kelas");
                    $('#btnSimpanKelas').val('update');
                    // Kirim data yang di-respon ke value input dan option
                    $("#dataId").val(data.id);
                    $("#nama").val(data.nama);
                    $("#id_wali").val(data.id_wali);
                })
            });
            //delete
            $(document).on('click', '.delete', function() {
                dataId = $(this).attr('id');
                $('#konfirmasi-modal').modal('show');
            });

            //btnSimpanKelas
            $('#btnSimpanKelas').click(function() {
                var id = $('#dataId').val();
                var nama = $('#nama').val();
                var id_wali = $('#id_wali').val();
                var errors = [];
                var fields = {
                    'nama': 'Nama kelas',
                    'id_wali': 'Harap pilih wali kelas'
                };
                // Memeriksa setiap input field dan menambahkan pesan error jika kosong
                $.each(fields, function(key, value) {
                    if ($.trim($('#' + key).val()) == '') {
                        errors.push(value + ' tidak boleh kosong');
                        $('#' + key).addClass('is-invalid');
                    } else {
                        $('#' + key).removeClass('is-invalid');
                    }
                });

                if (errors.length > 0) {
                    var message = errors.join('<br>');
                    Swal.fire({
                        icon: 'error',
                        html: message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    return false;
                }
                // jika semua data sudah diisi, kirim form
                $.ajax({
                    url: '{{ route('kelas.store') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,
                        'nama': nama,
                        'id_wali': id_wali
                    },
                    success: function(response) {
                        $('#tambahKelasModal').modal('hide');
                        $('#formTambahKelas')[0].reset();
                        $('.kelastable').DataTable().ajax.reload();
                        Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });

            });

            //btn tombol-hapus
            $('#tombol-hapus').click(function() {
                var url = "kelas/" + dataId;
                $.ajax({
                    url: url,
                    type: 'delete',
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    beforeSend: function() {
                        $(this).text('Hapus Data');
                    },
                    success: function(data) {
                        setTimeout(function() {
                            $('#konfirmasi-modal').modal('hide');
                            var oTable = $('.kelastable').dataTable();
                            oTable.fnDraw(false);
                        });
                        Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                })
            });

        });
        // $(document).ready(function() {
        //     var Toast = Swal.mixin({
        //         toast: true,
        //         position: 'top-end',
        //         showConfirmButton: false,
        //         timer: 3000
        //     });

        //     $('.swalDefaultSuccess').ready(function() {
        //         var message = '{{ $message }}';
        //         if (message) {
        //             Toast.fire({
        //                 icon: 'success',
        //                 title: message
        //             });
        //         }
        //     });
        // });
    </script>
@endpush
