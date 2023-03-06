<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Agama;
use App\Models\Jabatan;
use App\Models\Jenisk;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $data = Admin::where('nama', 'LIKE', "%$keyword%")
            ->orWhere('id_jabatan', 'LIKE', "%$keyword%")
            ->paginate(5);
        return view('super_admin.staff.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agama = Agama::all();
        $jabatan = Jabatan::all();
        $jk = Jenisk::all();
        return view('super_admin.staff.create', compact('agama', 'jabatan', 'jk'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:25',
            'email' => 'required|string|email|max:55|unique:users',
            'notelepon' => 'required|string|max:13',
            'nohp' => 'required|string|max:13',
            'alamat' => 'required',
            'id_agama' => 'required',
            'id_jabatan' => 'required',
            'id_jk' => 'required',
            'tgl_lahir' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);
        $input = $request->all();
        if ($foto = $request->file('foto')) {
            $destinationPath = 'image/';
            $profileimage = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $image = Image::make($foto)->resize(300, 300)->save('image/' . $profileimage);
            $image->save(public_path($destinationPath . $profileimage));
            $input['foto'] = "$profileimage";
        } else {
            $input['foto'] = null;
        }
        try {
            Admin::create($input);
            return redirect()->route('admins.index')
                ->with('success', 'Data Berhasil Di Tambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['messages' => 'Gagal Menyimpan Data'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Admin::findOrFail($id);
        return view('super_admin.staff.show', compact('data'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agama = Agama::all();
        $jabatan = Jabatan::all();
        $jk = Jenisk::all();
        $data = Admin::findOrFail($id);
        return view('super_admin.staff.edit', compact('data', 'agama', 'jabatan', 'jk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:25',
            'alamat' => 'required',
            'notelepon' => 'required|string|max:13',
            'nohp' => 'required|string|max:13',
            'email' => 'required|string|email|max:55|unique:users,email,' . $id,
            'id_agama' => 'required',
            'id_jabatan' => 'required',
            'id_jk' => 'required',
            'tgl_lahir' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'nama.required' => 'Nama user tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'foto.required' => 'Format file tidak didukung'
        ]);
        $user = Admin::findOrFail($id);
        if ($foto = $request->file('foto')) {
            $destinationPath = 'image/';
            $profileimage = date('YmdHis') . '.' . $foto->getClientOriginalExtension();
            $image = Image::make($foto)->resize(300, 200,)->save('image/' . $profileimage);
            // Menyimpan gambar yang sudah diubah ukurannya ke folder tujuan
            $image->save(public_path($destinationPath . $profileimage));
            $user['foto'] = "$profileimage";
        }
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->notelepon = $request->notelepon;
        $user->nohp = $request->nohp;
        $user->email = $request->email;
        $user->id_agama = $request->id_agama;
        $user->id_jabatan = $request->id_jabatan;
        $user->id_jk = $request->id_jk;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->save();
        return redirect()->route('admins.index')
            ->with('success', 'Data Berhasil Di Perbaharui');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Admin::findOrFail($id);
        $data->delete();
        return redirect()->route('admins.index')
            ->with('success', 'Data Pegawai Berhasil Terhapus');
    }
}
