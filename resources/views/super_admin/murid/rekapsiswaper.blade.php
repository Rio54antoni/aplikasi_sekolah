<!DOCTYPE html>
<html>

<head>
    <title>Data Murid</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th,
        td {
            text-align: left;
            padding: 1px;
            font-size: 8px;
            word-wrap: break-word;
            border: 1px solid black;

        }

        th {
            background-color: #dddddd;
        }

        .fixed-width {
            width: 150px;
            white-space: normal;
            word-wrap: break-word;
            border-bottom: 1px solid #ddd;
        }

        .col1 {
            width: 10%;
        }

        .col2 {
            width: 8%;
            white-space: small;
            word-wrap: break-word;
            border-bottom: 1px solid #080808;
        }

        .col4 {
            width: 8%;
            white-space: small;
            word-wrap: break-word;
            border-bottom: 1px solid #080808;
        }

        .col3 {
            width: 100px;
            white-space: normal;
            word-wrap: break-word;
            border-bottom: 1px solid #080808;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h5 class="description-header">{{ App\Models\Profilapp::first()->nama }}</h5>
    <span class="description-text">NSS : {{ App\Models\Profilapp::first()->nis }}</span>

    <table>
        <thead>
            <tr>
                <th class="col1">No</th>
                <th class="col1">Nama</th>
                <th class="col1">Jenis Kelamin</th>
                <th class="col1">Tempat Lahir</th>
                <th class="col1">Tanggal Lahir</th>
                <th class="col1">Agama</th>
                <th class="col1">Alamat</th>
                <th class="col1">NIS</th>
                <th class="col1">No.HP</th>
                <th class="col1">Email</th>
                <th class="col1">Nama Ayah</th>
                <th class="col1">Pekerjaan Ayah</th>
                <th class="col1">Nama Ibu</th>
                <th class="col1">Pekerjaan Ibu</th>
                <th class="col1">No.HP Orang Tua</th>
                <th class="col1">Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $murid)
                <tr>
                    <td class="col4">{{ $i++ }}</td>
                    <td class="col3">{{ $murid->nama }}</td>
                    <td class="col2">{{ $murid->jenis_kelamin }}</td>
                    <td class="col2">{{ $murid->tempat_lahir }}</td>
                    <td class="col2">{{ \Carbon\Carbon::parse($murid->tgl_lahir)->isoFormat(' DD-MM-YYYY') }}</td>
                    <td class="col2">{{ $murid->agama->nama }}</td>
                    <td class="col3">{{ $murid->alamat }}</td>
                    <td class="col2">{{ $murid->nis }}</td>
                    <td class="col2">{{ $murid->nohp }}</td>
                    <td class="col3">{{ $murid->email }}</td>
                    <td class="col3">{{ $murid->ayah }}</td>
                    <td class="col2">{{ $murid->pekerjaan_ayah->nama }}</td>
                    <td class="col3">{{ $murid->ibu }}</td>
                    <td class="col2">{{ $murid->pekerjaan_ibu->nama }}</td>
                    <td class="col2">{{ $murid->nohp_ortu }}</td>
                    <td class="col2">{{ $murid->tgl_daftar }}</td>
                    {{-- <td class="col2">
                        {{ \Carbon\Carbon::parse($murid->tgl_daftar)->isoFormat('dddd, DD MMMM YYYY') }}
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            Nama Kepala
        </tfoot>
    </table>

</body>

</html>
