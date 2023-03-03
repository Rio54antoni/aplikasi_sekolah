<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrangController extends Controller
{
    public function index()
    {
        return view('orang_tua.index');
    }
}
