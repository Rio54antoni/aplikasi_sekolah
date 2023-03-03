<?php

namespace App\Http\Controllers;

use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('super_admin.user_management.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = [
            [
                'nama' => 'super_admin',
                'keterangan' => 'Super Admin'
            ],
            [
                'nama' => 'kepala_sekolah',
                'keterangan' => 'Kepala Sekolah'
            ],
            [
                'nama' => 'staf',
                'keterangan' => 'Staff'
            ],
            [
                'nama' => 'guru',
                'keterangan' => 'Guru'
            ],
            [
                'nama' => 'orang_tua',
                'keterangan' => 'Orang tua murid'
            ],
            [
                'nama' => 'murid',
                'keterangan' => 'Murid'
            ],
        ];
        return view('super_admin.user_management.create', compact('role'));

        // return view('super_admin.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:25',
            'email' => 'required|string|email|max:55|unique:users',
            'role' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'nama.required' => 'Nama user tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'role.required' => 'Pilih salah satu role akun',
            'password.required' => 'Password harap diisi',
            'password_confirmation.required' => 'Konfirmasi password harap diisi',
            'foto.required' => 'Format file tidak didukung'
        ]);

        $input = $request->except('password_confirmation');
        $input['password'] = Hash::make($request->password);
        $input = $request->all();
        if ($foto = $request->file('foto')) {
            $destinationPath = 'image/';
            $profileimage = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $image = Image::make($foto)->resize(300, 200,)->save('image/' . $profileimage);
            // Menyimpan gambar yang sudah diubah ukurannya ke folder tujuan
            $image->save(public_path($destinationPath . $profileimage));
            $input['foto'] = "$profileimage";
        } else {
            $input['foto'] = null;
        }
        try {
            User::create($input);
            return redirect()->route('users.index')
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
        $data = User::findOrFail($id);
        return view('super_admin.user_management.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        $role = [
            [
                'nama' => 'super_admin',
                'keterangan' => 'Super Admin'
            ],
            [
                'nama' => 'kepala_sekolah',
                'keterangan' => 'Kepala Sekolah'
            ],
            [
                'nama' => 'staf',
                'keterangan' => 'Staff'
            ],
            [
                'nama' => 'guru',
                'keterangan' => 'Guru'
            ],
            [
                'nama' => 'orang_tua',
                'keterangan' => 'Orang tua murid'
            ],
            [
                'nama' => 'murid',
                'keterangan' => 'Murid'
            ],
        ];
        return view('super_admin.user_management.edit', compact('data', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:25',
            'email' => 'required|string|email|max:55|unique:users,email,' . $id,
            'role' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'nama.required' => 'Nama user tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'role.required' => 'Pilih salah satu role akun',
            'password.required' => 'Password harap diisi',
            'password_confirmation.required' => 'Konfirmasi password harap diisi',
            'foto.required' => 'Format file tidak didukung'
        ]);
        $user = User::findOrFail($id);
        if ($foto = $request->file('foto')) {
            $destinationPath = 'image/';
            $profileimage = date('YmdHis') . '.' . $foto->getClientOriginalExtension();
            $image = Image::make($foto)->resize(300, 200,)->save('image/' . $profileimage);
            // Menyimpan gambar yang sudah diubah ukurannya ke folder tujuan
            $image->save(public_path($destinationPath . $profileimage));
            $user['foto'] = "$profileimage";
        }
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.index')
            ->with('success', 'Data Berhasil Di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('users.index')
            ->with('success', 'Data Terhapus');
    }
}
