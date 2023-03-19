<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Murid;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    public function index()
    {
        $data = User::all();
        $matapelajaran = MataPelajaran::all();
        $wali = Kelas::all();
        $waliklas = Pegawai::all();
        $murid = Murid::count();
        $pegawai = Pegawai::count();
        $staf = Admin::count();
        return view('super_admin.index', compact(
            'matapelajaran',
            'data',
            'wali',
            'waliklas',
            'murid',
            'pegawai',
            'staf'
        ));
    }
}
