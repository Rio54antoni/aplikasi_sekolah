<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    public function index()
    {
        $murid = Murid::count();
        $pegawai = Pegawai::count();
        return view('super_admin.index', compact('murid', 'pegawai'));
    }
}
