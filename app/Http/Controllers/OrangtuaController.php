<?php

namespace App\Http\Controllers;

use App\Models\Kerja;
use App\Models\Murid;
use App\Models\Orangtua;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class OrangtuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $data = Orangtua::where('nama', 'LIKE', "%$keyword%")
            ->orWhere('email', 'LIKE', "%$keyword%")
            ->paginate(5);
        return view('super_admin.orang_tua.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kerja = Kerja::all();
        $hubungan = Murid::all();
        return view('super_admin.orang_tua.create', compact('kerja', 'hubungan'));
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
            'hubungan' => 'required',
            'id_kerja' => 'required',
            'nama_perusahaan' => 'required',
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
            Orangtua::create($input);
            return redirect()->route('orangtuas.index')
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
        $data = Orangtua::findOrFail($id);
        return view('super_admin.orang_tua.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kerja = Kerja::all();
        $hubungan = Murid::all();
        $data = Orangtua::findOrFail($id);
        return view('super_admin.orang_tua.edit', compact('data', 'kerja', 'hubungan'));
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
            'hubungan' => 'required',
            'nama_perusahaan' => 'required',
            'id_kerja' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'nama.required' => 'Nama user tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'foto.required' => 'Format file tidak didukung'
        ]);
        $user = Orangtua::findOrFail($id);
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
        $user->hubungan = $request->hubungan;
        $user->nama_perusahaan = $request->nama_perusahaan;
        $user->id_kerja = $request->id_kerja;
        $user->save();
        return redirect()->route('orangtuas.index')
            ->with('success', 'Data Berhasil Di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Orangtua::findOrFail($id);
        $data->delete();
        return redirect()->route('orangtuas.index')
            ->with('success', 'Data Pegawai Berhasil Terhapus');
    }
}
