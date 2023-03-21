<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Jenisk;
use App\Models\Kerja;
use App\Models\Murid;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Murid::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="' . route('murids.show', $row->id) . '"class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Show"><i class="fas fa-info-circle"></i></a> |';
                    $btn = $btn . '<a href="' . route('murids.edit', $row->id) . '"class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a> |';
                    $btn = $btn . '<form action="' . route('murids.destroy', $row->id) . '" method="POST" onsubmit="confirmDelete()" style="display: inline-block">
                    ' . method_field('DELETE') . csrf_field() . '
                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></button>
                    </form>';
                    return $btn;
                })
                ->addColumn('tgl_lahir', function ($row) {
                    return Carbon::parse($row->tgl_lahir)->isoFormat('dddd, DD MMMM YYYY');
                })
                ->addColumn('foto_diri', function ($row) {
                    return '<img src="/image/images/' . $row->foto_diri . '" width="50" height="50" />';
                })
                ->rawColumns(['action', 'foto_diri', 'tgl_lahir'])
                ->make(true);
        }
        return view('super_admin.murid.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agama = Agama::all();
        $kerja = Kerja::all();
        return view('super_admin.murid.create', compact('agama', 'kerja'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'sometimes|required|string|max:25',
            'email' => 'sometimes|required|string|email|max:55|unique:murids',
            'nis' => 'sometimes|required|string|max:9',
            'nohp' => 'sometimes|required|string|max:13',
            'alamat' => 'sometimes|required',
            'jenis_kelamin' => 'required',
            'id_agama' => 'sometimes|required',
            'tempat_lahir' => 'sometimes|required',
            'tgl_lahir' => 'sometimes|required',
            'ayah' => 'sometimes|nullable|string|max:25',
            'ibu' => 'sometimes|nullable|string|max:25',
            'wali' => 'sometimes|nullable|string|max:25',
            'kerja_ayah' => 'sometimes|nullable|string',
            'kerja_ibu' => 'sometimes|nullable|string',
            'kerja_wali' => 'sometimes|nullable|string',
            'nohp_ortu' => 'sometimes|nullable',
            'tgl_daftar' => 'sometimes|required',
            'foto_diri' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->all();
        if ($foto = $request->file('foto_diri')) {
            $destinationPath = 'image/';
            $profileimage = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $image = Image::make($foto)->resize(300, 200,)->save('image/images/' . $profileimage);
            // Menyimpan gambar yang sudah diubah ukurannya ke folder tujuan
            // $image->save(public_path($destinationPath . $profileimage));
            $foto->move($destinationPath, $profileimage);
            $input['foto_diri'] = "$profileimage";
        } else {
            $input['foto_diri'] = null;
        }
        try {
            Murid::create($input);
            return redirect()->route('murids.index')
                ->with('success', 'Data Berhasil Di Tambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['message' => 'Gagal menyimpan data. Silahkan coba lagi.'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Murid::findOrFail($id);
        return view('super_admin.murid.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Murid::findOrFail($id);
        $agama = Agama::all();
        $kerja = Kerja::all();
        return view('super_admin.murid.edit', compact('data', 'agama', 'kerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'sometimes|required|string|max:25',
            'email' => 'required|string|email|max:55|unique:murids,email,' . $id,
            'nis' => 'required|string|max:9|unique:murids,nis,' . $id,
            'nohp' => 'sometimes|required|string|max:13',
            'alamat' => 'sometimes|required',
            'jenis_kelamin' => 'required',
            'id_agama' => 'sometimes|required',
            'tempat_lahir' => 'sometimes|required',
            'tgl_lahir' => 'sometimes|required',
            'ayah' => 'sometimes|nullable|string|max:25',
            'ibu' => 'sometimes|nullable|string|max:25',
            'wali' => 'sometimes|nullable|string|max:25',
            'kerja_ayah' => 'sometimes|nullable|string',
            'kerja_ibu' => 'sometimes|nullable|string',
            'kerja_wali' => 'sometimes|nullable|string',
            'nohp_ortu' => 'sometimes|nullable',
            'tgl_daftar' => 'sometimes|required',
            'foto' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user = Murid::findOrFail($id);
        if ($foto = $request->file('foto_diri')) {
            $destinationPath = 'image/';
            $profileimage = date('YmdHis') . '.' . $foto->getClientOriginalExtension();
            $image = Image::make($foto)->resize(300, 200,)->save('image/images/' . $profileimage);
            // Menyimpan gambar yang sudah diubah ukurannya ke folder tujuan
            // $image->save(public_path($destinationPath . $profileimage));
            $foto->move($destinationPath, $profileimage);
            $user['foto_diri'] = "$profileimage";
        }
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->nis = $request->nis;
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->id_agama = $request->id_agama;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->ayah = $request->ayah;
        $user->kerja_ayah = $request->kerja_ayah;
        $user->ibu = $request->ibu;
        $user->kerja_ibu = $request->kerja_ibu;
        $user->wali = $request->wali;
        $user->kerja_wali = $request->kerja_wali;
        $user->nohp_ortu = $request->nohp_ortu;
        $user->tgl_daftar = $request->tgl_daftar;
        $user->save();
        return redirect()->route('murids.index')
            ->with('success', 'Data Berhasil Di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Murid::findOrFail($id);
        $data->delete();
        return redirect()->route('murids.index')
            ->with('success', 'Data berhasil dihapus ');
    }
}
