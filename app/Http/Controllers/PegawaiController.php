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
                ->addColumn('agama', function ($row) {
                    return ($row->_agama->nama);
                })
                ->addColumn('tanggal_lahir', function ($row) {
                    return Carbon::parse($row->tanggal_lahir)->isoFormat('dddd, DD MMMM YYYY');
                })
                ->addColumn('foto', function ($row) {
                    return '<img src="/image/images/' . $row->foto_diri . '" width="50" height="50" />';
                })
                ->rawColumns(['action', 'foto', 'tanggal_lahir'])
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
        return view('super_admin.pegawai.create', compact('agama', 'jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $request->validate([
            'nama' => 'required|string|max:55',
            'nik' => 'required|string|max:16|regex:/^\d+$/',
            'email' => 'required|string|email|max:30|unique:pegawais',
            'telpon' => 'required|string|max:13|regex:/^\d+$/',
            'tempat_lahir' => 'required|string|max:60',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'sts_pernikahan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|string|max:64',
            'nip' => 'required|string|max:18|regex:/^\d+$/',
            'tgl_daftar' => 'required',
            'id_pendidikan' => 'required',
            'gelar' => 'required',
            'npwp' => 'sometimes|nullable|max:16|regex:/^\d+$/',
            'id_jabatan' => 'required',
            'id_status' => 'required',
            'foto_diri' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'foto_ktp' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'foto_ijazah' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'foto_npwp' => 'sometimes|nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);
        $input = $request->all();
        // foto diri
        if ($fotoDiri = $request->file('foto_diri')) {
            $destinationPath = 'image/';
            $profileimageDiri = date('YmdHis') . "_pdiri." . $fotoDiri->getClientOriginalExtension();
            $imageDiri = Image::make($fotoDiri)->resize(300, 300)->save('image/images/' . $profileimageDiri);
            $fotoDiri->move($destinationPath, $profileimageDiri);
            $input['foto_diri'] = $profileimageDiri;
        } else {
            $input['foto_ktp'] = null;
        }
        // foto ktp
        if ($fotoKtp = $request->file('foto_ktp')) {
            $destinationPath = 'image/';
            $profileimageKtp = date('YmdHis') . "_pktp." . $fotoKtp->getClientOriginalExtension();
            Image::make($fotoKtp)->resize(300, 300)->save('image/images/' . $profileimageKtp);
            $fotoKtp->move($destinationPath, $profileimageKtp);
            $input['foto_ktp'] = $profileimageKtp;
        } else {
            $input['foto_ktp'] = null;
        }
        // foto ijazah
        if ($fotoIjazah = $request->file('foto_ijazah')) {
            $destinationPath = 'image/';
            $profileimageIjazah = date('YmdHis') . "_pijazah." . $fotoIjazah->getClientOriginalExtension();
            Image::make($fotoIjazah)->resize(300, 300)->save('image/images/' . $profileimageIjazah);
            $fotoIjazah->move($destinationPath, $profileimageIjazah);
            $input['foto_ijazah'] = $profileimageIjazah;
        } else {
            $input['foto_ijazah'] = null;
        }
        // foto npwp
        if ($fotoNpwp = $request->file('foto_npwp')) {
            $destinationPath = 'image/';
            $profileimageNpwp = date('YmdHis') . "_pnpwp." . $fotoNpwp->getClientOriginalExtension();
            Image::make($fotoNpwp)->resize(300, 300)->save('image/images/' . $profileimageNpwp);
            $fotoNpwp->move($destinationPath, $profileimageNpwp);
            $input['foto_npwp'] = $profileimageNpwp;
        } else {
            $input['foto_npwp'] = null;
        }
        try {
            Pegawai::create($input);
            return redirect()->route('pegawais.index')
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
        $data = Pegawai::findOrFail($id);
        return view('super_admin.pegawai.edit', compact('data', 'agama', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:55',
            'nik' => 'required|string|max:16|regex:/^\d+$/',
            'email' => 'required|string|email|max:30|unique:pegawais,email,' . $id,
            'telpon' => 'required|string|max:13|regex:/^\d+$/',
            'tempat_lahir' => 'required|string|max:60',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'sts_pernikahan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|string|max:64',
            'nip' => 'required|string|max:18|regex:/^\d+$/',
            'tgl_daftar' => 'required',
            'id_pendidikan' => 'required',
            'gelar' => 'required',
            'npwp' =>  'sometimes|nullable|max:16|regex:/^\d+$/',
            'id_jabatan' => 'required',
            'id_status' => 'required',
            'foto_diri' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'foto_ktp' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'foto_ijazah' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'foto_npwp' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);
        $user = Pegawai::findOrFail($id);
        if ($fotoDiri = $request->file('foto_diri')) {
            $destinationPath = 'image/';
            $profileimageDiri = date('YmdHis') . "_diri." . $fotoDiri->getClientOriginalExtension();
            $imageDiri = Image::make($fotoDiri)->resize(300, 300)->save('image/images/' . $profileimageDiri);
            $fotoDiri->move($destinationPath, $profileimageDiri);
            $user['foto_diri'] = $profileimageDiri;
        }
        // foto ktp
        if ($fotoKtp = $request->file('foto_ktp')) {
            $destinationPath = 'image/';
            $profileimageKtp = date('YmdHis') . "_ktp." . $fotoKtp->getClientOriginalExtension();
            Image::make($fotoKtp)->resize(300, 300)->save('image/images/' . $profileimageKtp);
            $fotoKtp->move($destinationPath, $profileimageKtp);
            $user['foto_ktp'] = $profileimageKtp;
        }
        // foto ijazah
        if ($fotoIjazah = $request->file('foto_ijazah')) {
            $destinationPath = 'image/';
            $profileimageIjazah = date('YmdHis') . "_ijazah." . $fotoIjazah->getClientOriginalExtension();
            Image::make($fotoIjazah)->resize(300, 300)->save('image/images/' . $profileimageIjazah);
            $fotoIjazah->move($destinationPath, $profileimageIjazah);
            $user['foto_ijazah'] = $profileimageIjazah;
        }
        // foto npwp
        if ($fotoNpwp = $request->file('foto_npwp')) {
            $destinationPath = 'image/';
            $profileimageNpwp = date('YmdHis') . "_npwp." . $fotoNpwp->getClientOriginalExtension();
            Image::make($fotoNpwp)->resize(300, 300)->save('image/images/' . $profileimageNpwp);
            $fotoNpwp->move($destinationPath, $profileimageNpwp);
            $user['foto_npwp'] = $profileimageNpwp;
        }
        $user->nama = $request->nama;
        $user->nik = $request->nik;
        $user->email = $request->email;
        $user->telpon = $request->telpon;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->agama = $request->agama;
        $user->sts_pernikahan = $request->sts_pernikahan;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->nip = $request->nip;
        $user->tgl_daftar = $request->tgl_daftar;
        $user->id_pendidikan = $request->id_pendidikan;
        $user->gelar = $request->gelar;
        $user->npwp = $request->npwp;
        $user->id_jabatan = $request->id_jabatan;
        $user->id_status = $request->id_status;
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
