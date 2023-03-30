<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Murid;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Nilai::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="' . route('nilais.show', $row->id) . '"class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Show"><i class="fas fa-eye"></i></a> |';
                    $btn = $btn . '<a href="' . route('nilais.edit', $row->id) . '"class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a> |';
                    $btn = $btn . '<form action="' . route('nilais.destroy', $row->id) . '" method="POST" onsubmit="confirmDelete()" style="display: inline-block">
                    ' . method_field('DELETE') . csrf_field() . '
                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></button>
                    </form>';
                    return $btn;
                })
                ->addColumn('id_siswa', function ($row) {
                    return ($row->murid->nama ?? 'Belum di pilih');
                })
                ->addColumn('id_kelas', function ($row) {
                    return ($row->kelas->nama ?? 'Belum di pilih');
                })
                ->addColumn('id_mapel', function ($row) {
                    return ($row->mapel->nama ?? 'Belum di pilih');
                })
                ->addColumn('id_tahun', function ($row) {
                    return ($row->tahun->tahun ?? 'Belum di pilih');
                })
                ->addColumn('semester', function ($row) {
                    return ($row->tahun->semester);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('super_admin.data_nilai.index');
    }

    public function ikelas(Request $request)
    {
        if ($request->ajax()) {
        } else {
            abort(404);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Murid::all();
        $mapel = MataPelajaran::all();
        $kelas = Kelas::all();
        $tahun_ajar = Tahun::all();
        return view('super_admin.data_nilai.create', compact('siswa', 'mapel', 'kelas', 'tahun_ajar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|string|max:55',
            'id_siswa' => 'required|string|max:55',
            'id_tahun' => 'required|string|max:55',
            'id_mapel' => 'required|string|max:55',
            'absensi' => 'sometimes|nullable|string|max:3',
            'nilai_tugas' => 'sometimes|nullable|string|max:3',
            'nilai_ulangan' => 'sometimes|nullable|string|max:3',
            'nilai_uts' => 'sometimes|nullable|string|max:3',
            'nilai_uas' => 'sometimes|nullable|string|max:3',
        ]);
        Nilai::create($request->all());
        return redirect()->route('nilais.index')
            ->with('success', 'Data Jadwal Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Nilai::findOrFail($id);
        $siswa = Murid::all();
        $mapel = MataPelajaran::all();
        $kelas = Kelas::all();
        $tahun_ajar = Tahun::all();
        return view('super_admin.data_nilai.show', compact('data', 'siswa', 'mapel', 'kelas', 'tahun_ajar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Nilai::findOrFail($id);
        $siswa = Murid::all();
        $mapel = MataPelajaran::all();
        $kelas = Kelas::all();
        $tahun_ajar = Tahun::all();
        return view('super_admin.data_nilai.edit', compact('data', 'siswa', 'mapel', 'kelas', 'tahun_ajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kelas' => 'required|string|max:55',
            'id_siswa' => 'required|string|max:55',
            'id_tahun' => 'required|string|max:55',
            'id_mapel' => 'required|string|max:55',
            'absensi' => 'sometimes|nullable|string|max:3',
            'nilai_tugas' => 'sometimes|nullable|string|max:3',
            'nilai_ulangan' => 'sometimes|nullable|string|max:3',
            'nilai_uts' => 'sometimes|nullable|string|max:3',
            'nilai_uas' => 'sometimes|nullable|string|max:3',
        ]);
        $data = Nilai::findOrFail($id);
        $data->id_kelas = $request->id_kelas;
        $data->id_siswa = $request->id_siswa;
        $data->id_tahun = $request->id_tahun;
        $data->id_mapel = $request->id_mapel;
        $data->absensi = $request->absensi;
        $data->nilai_tugas = $request->nilai_tugas;
        $data->nilai_ulangan = $request->nilai_ulangan;
        $data->nilai_uts = $request->nilai_uts;
        $data->nilai_uas = $request->nilai_uas;
        $data->update();
        return redirect()->route('nilais.index')
            ->with('success', 'Data Telah Di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Nilai::findOrFail($id);
        $data->delete();
        return redirect()->route('nilais.index')
            ->with('success', 'Data berhasil di hapus');
    }
}
