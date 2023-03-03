<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuridadmController extends Controller
{
    public function index()
    {
        return view('murid.index');
    }
}
