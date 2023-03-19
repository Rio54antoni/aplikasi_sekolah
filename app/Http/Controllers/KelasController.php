<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Nette\Utils\Strings;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $waliklas = Pegawai::all();
        if ($request->ajax()) {
            $data = Kelas::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="btn btn-sm btn-info editupdate" title="Edit"><i class="fas fa-fw fa-pencil-alt"></i></a> |';
                    $btn .= '&nbsp';
                    $btn .=   '<button type="button" name="delete" id="' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                    return $btn;
                })
                ->addColumn('id_kelas', function ($row) {
                    return ($row->wali_kelas->nama);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('super_admin.kelas.index', compact('waliklas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $wali = Pegawai::all();
    //     return view('super_admin.kelas.create', compact('wali'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // lakukan valodation data terlebih dahulu
        $request->validate([
            'nama' => 'required',
            'id_wali' => 'required',
        ], [
            'nama.required' => 'Nama kelas tidak boleh kosong',
            'id_wali.required' => 'Harap pilih nama wali kelas',
        ]);
        // validation aman , maka lanjut ke proses menyimpan data request ke var data
        $data = [
            'nama' => $request->nama,
            'id_wali' => $request->id_wali,
        ];

        Kelas::updateOrCreate(
            [
                'id' => $request->input('id')
            ],
            $data
        );
        return response()->json(['success' => true, 'Data berhasil disimpan ']);
    }
    //codingan lama jika menggunakan file create.blade.php
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'id_wali' => 'required'
    //     ]);
    //     Kelas::create($request->all());
    //     return redirect()->route('super_admin.index')
    //         ->with('success', 'Data Kelas di Tambah');
    // }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Kelas::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'id_wali' => 'required'
        ]);
        $data = Kelas::findOrFail($id);
        $data->nama = $request->nama;
        $data->id_wali = $request->id_wali;
        $data->update();
        return redirect()->route('kelas.index')
            ->with('success', 'Data Telah Di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kelas::find($id)->delete();

        return response()->json(['success' => true, 'Data berhasil dihapus ']);
        // $data = Kelas::findOrFail($id);
        // $data->delete();
        // return redirect()->route('kelas.index')
        //     ->with('success', 'Data berhasil di hapus');
    }
}
