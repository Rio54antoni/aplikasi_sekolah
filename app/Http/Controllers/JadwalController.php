<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Js;
use Yajra\DataTables\Facades\DataTables;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Jadwal::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="' . route('jadwals.show', $row->id) . '"class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Show"><i class="fas fa-info-circle"></i></a> |';
                    $btn = $btn . '<a href="' . route('jadwals.edit', $row->id) . '"class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a> |';
                    $btn = $btn . '<form action="' . route('jadwals.destroy', $row->id) . '" method="POST" onsubmit="confirmDelete()" style="display: inline-block">
                    ' . method_field('DELETE') . csrf_field() . '
                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></button>
                    </form>';
                    return $btn;
                })
                ->addColumn('id_kelas', function ($row) {
                    return ($row->kelas->nama);
                })
                ->addColumn('id_mapel', function ($row) {
                    return ($row->mapel->nama);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('super_admin.jadwal.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kel = Kelas::all();
        $matap = MataPelajaran::all();
        return view('super_admin.jadwal.create', compact('matap', 'kel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'id_kelas' => 'required',
            'id_mapel' => 'required'
        ]);
        Jadwal::create($request->all());
        return redirect()->route('jadwals.index')
            ->with('success', 'Data Jadwal Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Jadwal::findOrFail($id);
        $kel = Kelas::all();
        $matap = MataPelajaran::all();
        return view('super_admin.jadwal.show', compact('data', 'matap', 'kel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Jadwal::findOrFail($id);
        $kel = Kelas::all();
        $matap = MataPelajaran::all();
        return view('super_admin.jadwal.edit', compact('data', 'matap', 'kel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'id_kelas' => 'required',
            'id_mapel' => 'required'
        ]);
        $data = Jadwal::findOrFail($id);
        $data->hari = $request->hari;
        $data->jam_mulai = $request->jam_mulai;
        $data->jam_selesai = $request->jam_selesai;
        $data->id_kelas = $request->id_kelas;
        $data->id_mapel = $request->id_mapel;
        $data->update();
        return redirect()->route('jadwals.index')
            ->with('success', 'Data Telah Di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Jadwal::findOrFail($id);
        $data->delete();
        return redirect()->route('jadwals.index')
            ->with('success', 'Data Berhasil Hapus');
    }
}
