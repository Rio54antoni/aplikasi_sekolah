<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Jabatan;
use App\Models\Jenisk;
use App\Models\Pegawai;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pegawai::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="' . route('pegawais.show', $row->id) . '"class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Show"><i class="fas fa-info-circle"></i></a> |';
                    $btn = $btn . '<a href="' . route('pegawais.edit', $row->id) . '"class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a> |';
                    $btn = $btn . '<form action="' . route('pegawais.destroy', $row->id) . '" method="POST" onsubmit="confirmDelete()" style="display: inline-block">
                ' . method_field('DELETE') . csrf_field() . '
                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></button>
                </form>';
                    return $btn;
                })
                ->addColumn('id_jk', function ($row) {
                    return ($row->jeniskelamin->nama);
                })
                ->addColumn('tgl_lahir', function ($row) {
                    return Carbon::parse($row->tgl_lahir)->isoFormat('dddd, DD MMMM YYYY');
                })
                ->addColumn('foto', function ($row) {
                    return '<img src="/image/images/' . $row->foto . '" width="50" height="50" />';
                })
                ->rawColumns(['action', 'foto', 'tgl_lahir'])
                ->make(true);
        }
        return view('super_admin.pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agama = Agama::all();
        $jabatan = Jabatan::all();
        $jk = Jenisk::all();
        return view('super_admin.pegawai.create', compact('agama', 'jabatan', 'jk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:25',
            'email' => 'required|string|email|max:55|unique:users',
            'nip' => 'required|string|max:9',
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
            $image = Image::make($foto)->resize(300, 300)->save('image/images/' . $profileimage);
            // $image->save(public_path($destinationPath . $profileimage));
            $foto->move($destinationPath, $profileimage);
            $input['foto'] = "$profileimage";
        } else {
            $input['foto'] = null;
        }
        try {
            Pegawai::create($input);
            return redirect()->route('pegawais.index')
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
        $data = Pegawai::findOrFail($id);
        return view('super_admin.pegawai.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agama = Agama::all();
        $jabatan = Jabatan::all();
        $jk = Jenisk::all();
        $data = Pegawai::findOrFail($id);
        return view('super_admin.pegawai.edit', compact('data', 'agama', 'jabatan', 'jk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:25',
            'nip' => 'required|string|max:9',
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
        $user = Pegawai::findOrFail($id);
        if ($foto = $request->file('foto')) {
            $destinationPath = 'image/';
            $profileimage = date('YmdHis') . '.' . $foto->getClientOriginalExtension();
            $image = Image::make($foto)->resize(300, 200,)->save('image/images/' . $profileimage);
            // Menyimpan gambar yang sudah diubah ukurannya ke folder tujuan
            // $image->save(public_path($destinationPath . $profileimage));
            $foto->move($destinationPath, $profileimage);
            $user['foto'] = "$profileimage";
        }
        $user->nama = $request->nama;
        $user->nip = $request->nip;
        $user->alamat = $request->alamat;
        $user->notelepon = $request->notelepon;
        $user->nohp = $request->nohp;
        $user->email = $request->email;
        $user->id_agama = $request->id_agama;
        $user->id_jabatan = $request->id_jabatan;
        $user->id_jk = $request->id_jk;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->save();
        return redirect()->route('pegawais.index')
            ->with('success', 'Data Berhasil Di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Pegawai::findOrFail($id);
        $data->delete();
        return redirect()->route('pegawais.index')
            ->with('success', 'Data Pegawai Berhasil Terhapus');
    }
}
