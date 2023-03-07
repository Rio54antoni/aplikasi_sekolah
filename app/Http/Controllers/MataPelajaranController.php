<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mata = Pegawai::all();
        return view('super_admin.mata_pelajaran.create', compact('mata'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_guru' => 'required'
        ]);
        MataPelajaran::create($request->all());
        return redirect()->route('super_admin.index')
            ->with('success', 'Data Mata Pelajaran di Tambah');
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
        $data = MataPelajaran::findOrFail($id);
        $mata = Pegawai::all();
        return view('super_admin.mata_pelajaran.edit', compact('mata', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'id_guru' => 'required'
        ]);
        $data = MataPelajaran::findOrFail($id);
        $data->nama = $request->nama;
        $data->id_guru = $request->id_guru;
        $data->update();
        return redirect()->route('super_admin.index')
            ->with('success', 'Data Telah Di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = MataPelajaran::findOrFail($id);
        $data->delete();
        return redirect()->route('super_admin.index')
            ->with('success', 'Data berhasil di hapus');
    }
}
