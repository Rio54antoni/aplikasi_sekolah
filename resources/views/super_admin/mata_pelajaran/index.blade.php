@extends('master.layouts')
@section('title')
    Data Mata pelajaran
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
                            <table class="table table-bordered table-hover mptable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Guru Pengampu</th>
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
    <div class="modal fade" id="tambahMpModal" tabindex="-1" role="dialog" aria-labelledby="tambahMpModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahMpModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Tambah Jadwal -->
                    <form id="formTambahMp">
                        <input type="hidden" name="dataId" id="dataId" value="">

                        <div class="form-group">
                            <label for="nama">Mata Pelajaran</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="">
                            @error('nama')
                                <div class="invalid-feedback" id="nama_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_guru">Guru Pengampu</label>
                            <select name="id_guru" id="id_guru"
                                class="form-control @error('id_guru') is-invalid @enderror" required>
                                <option value="">-- Pilih Guru --</option>
                                @foreach ($waliklas as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_guru')
                                <div class="invalid-feedback" id="guru_error">{{ $message }}</div>
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                    <!-- End Form Tambah Jadwal -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="batal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSimpanMp">Simpan</button>
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
            $('.mptable').DataTable({
                processing: true,
                serverSide: true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                ajax: "{{ route('mata_pelajarans.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'id_guru',
                        name: 'id_guru',
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
                $('#tambahMpModalLabel').html("Tambah Mata pelajaran");
                $('#tambahMpModal').modal('show');

                $("#dataId").val('');
            });
            // batal tambah
            $(document).on('click', '#batal', function() {
                $("#nama").val("");
                $("#id_guru").val("");
                $("#nama").removeClass('is-invalid');
                $("#nama_error").text('');
                $("#id_guru").removeClass('is-invalid');
                $("#guru_error").text('');
            });
            //edit
            $(document).on('click', '.editupdate', function() {
                var dataId = $(this).data('id');
                // metode get berikut digunakan saat button klik berada pada controller
                $.get("{{ route('mata_pelajarans.edit', ':id') }}".replace(':id', dataId), function(data) {
                    $('#tambahMpModal').modal('show');
                    $('#tambahMpModalLabel').html("Edit Mata Pelajaran");
                    $('#btnSimpanMp').val('update');
                    // Kirim data yang di-respon ke value input dan option
                    $("#dataId").val(data.id);
                    $("#nama").val(data.nama);
                    $("#id_guru").val(data.id_guru);
                })
            });
            //delete
            $(document).on('click', '.delete', function() {
                dataId = $(this).attr('id');
                $('#konfirmasi-modal').modal('show');
            });

            //btnSimpanMp
            $('#btnSimpanMp').click(function() {
                var id = $('#dataId').val();
                var nama = $('#nama').val();
                var id_guru = $('#id_guru').val();
                var errors = [];
                var fields = {
                    'nama': 'Mata Pelajaran',
                    'id_guru': 'Harap pilih guru pengampu'
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
                    url: '{{ route('mata_pelajarans.store') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,
                        'nama': nama,
                        'id_guru': id_guru
                    },
                    success: function(response) {
                        $('#tambahMpModal').modal('hide');
                        $('#formTambahMp')[0].reset();
                        $('.mptable').DataTable().ajax.reload();
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
                var url = "mata_pelajarans/" + dataId;
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
                            var oTable = $('.mptable').dataTable();
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
    </script>
@endpush
