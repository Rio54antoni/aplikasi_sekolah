<?php

namespace App\Http\Controllers;

use App\Models\Profilapp;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilappController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Profilapp::all();
        return view('super_admin.profil_app.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profilapp $profilapp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Profilapp::findOrFail($id);
        return view('super_admin.profil_app.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:25',
            'email' => 'required|string|email|max:55|unique:users,email,' . $id,
            'alamat' => 'required|string|max:255',
            'notelepon' => 'required',
            'nss' => 'required',
            'akreditasi' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user = Profilapp::findOrFail($id);
        if ($logo = $request->file('logo')) {
            $destinationPath = 'image/';
            $profileimage = date('YmdHis') . '.' . $logo->getClientOriginalExtension();
            $image = Image::make($logo)->resize(300, 200,)->save('image/' . $profileimage);
            // Menyimpan gambar yang sudah diubah ukurannya ke folder tujuan
            $image->save(public_path($destinationPath . $profileimage));
            $user['logo'] = "$profileimage";
        }
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->notelepon = $request->notelepon;
        $user->nss = $request->nss;
        $user->akreditasi = $request->akreditasi;
        $user->save();
        return redirect()->route('profilapps.index')
            ->with('success', 'Data Berhasil Di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profilapp $profilapp)
    {
        //
    }
}
