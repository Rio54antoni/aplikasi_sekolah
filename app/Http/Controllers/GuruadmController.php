<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruadmController extends Controller
{
    public function index()
    {
        return view('guru.index');
    }
}
