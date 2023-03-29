<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $waliklas = Pegawai::all();
        if ($request->ajax()) {
            $data = MataPelajaran::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="btn btn-sm btn-info editupdate" title="Edit"><i class="fas fa-fw fa-pencil-alt"></i></a> |';
                    $btn .= '&nbsp';
                    $btn .=   '<button type="button" name="delete" id="' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                    return $btn;
                })
                ->addColumn('id_kelas', function ($row) {
                    return ($row->mapel->nama);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('super_admin.mata_pelajaran.index', compact('waliklas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $mata = Pegawai::all();
    //     return view('super_admin.mata_pelajaran.create', compact('mata'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // lakukan valodation data terlebih dahulu
        $request->validate([
            'nama' => 'required',
            'id_guru' => 'required',
        ], [
            'nama.required' => 'Mata pelajaran tidak boleh kosong',
            'id_guru.required' => 'Harap pilih nama guru pengampu',
        ]);
        // validation aman , maka lanjut ke proses menyimpan data request ke var data
        $data = [
            'nama' => $request->nama,
            'id_guru' => $request->id_guru,
        ];

        MataPelajaran::updateOrCreate(
            [
                'id' => $request->input('id')
            ],
            $data
        );
        return response()->json(['success' => true, 'Data berhasil disimpan ']);
    }

    /**
     * Display the specified resource.
     */
    public function show(MataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = MataPelajaran::find($id);
        return response()->json($data);
    }
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'id_guru' => 'required'
    //     ]);
    //     $data = MataPelajaran::findOrFail($id);
    //     $data->nama = $request->nama;
    //     $data->id_guru = $request->id_guru;
    //     $data->update();
    //     return redirect()->route('super_admin.index')
    //         ->with('success', 'Data Telah Di Perbaharui');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        MataPelajaran::find($id)->delete();
        return response()->json(['success' => true, 'Data berhasil dihapus ']);
    }
}
