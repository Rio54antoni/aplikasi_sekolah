<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wali = Pegawai::all();
        return view('super_admin.kelas.create', compact('wali'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_wali' => 'required'
        ]);
        Kelas::create($request->all());
        return redirect()->route('super_admin.index')
            ->with('success', 'Data Kelas di Tambah');
    }

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
        $data = Kelas::findOrFail($id);
        $wali = Pegawai::all();
        return view('super_admin.kelas.edit', compact('wali', 'data'));
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
        return redirect()->route('super_admin.index')
            ->with('success', 'Data Telah Di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Kelas::findOrFail($id);
        $data->delete();
        return redirect()->route('super_admin.index')
            ->with('success', 'Data berhasil di hapus');
    }
}
