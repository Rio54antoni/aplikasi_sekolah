<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Murid;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    public function index()
    {
        $matapelajaran = MataPelajaran::all();
        $wali = Kelas::all();
        $murid = Murid::count();
        $pegawai = Pegawai::count();
        $staf = Admin::count();
        return view('super_admin.index', compact(
            'matapelajaran',
            'wali',
            'murid',
            'pegawai',
            'staf'
        ));
    }
}
