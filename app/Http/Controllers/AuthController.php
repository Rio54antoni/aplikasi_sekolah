<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role == 'super_admin') {
                return redirect()->route('super_admin.index');
            } elseif ($user->role == 'kepala_sekolah') {
                return redirect()->route('kepala_sekolah.index');
            } elseif ($user->role == 'staf') {
                return redirect()->route('staf.index');
            } elseif ($user->role == 'guru') {
                return redirect()->route('guru.index');
            } elseif ($user->role == 'orang_tua') {
                return redirect()->route('orang.index');
            } elseif ($user->role == 'murid') {
                return redirect()->route('murid.index');
            }
        }
        return view('login.login');
    }

    public function proses(Request $request)
    {
        $messages = [
            'email.required' => 'Email wajib diisi!',
            'password.required' => 'Password wajib diisi!'
        ];
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ], $messages);

        if (auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            if (auth()->user()->role == 'super_admin') {
                return redirect()->route('super_admin.index');
            } elseif (auth()->user()->role == 'kepala_sekolah') {
                return redirect()->route('kepala_sekolah.index');
            } elseif (auth()->user()->role == 'staf') {
                return redirect()->route('staf.index');
            } elseif (auth()->user()->role == 'guru') {
                return redirect()->route('guru.index');
            } elseif (auth()->user()->role == 'orang_tua') {
                return redirect()->route('orang.index');
            } elseif (auth()->user()->role == 'murid') {
                return redirect()->route('murid.index');
            }
        } else {
            return redirect()->route('login.index')
                ->with('error', 'Email atau Password Salah.');
        }
    }
    // public function proses(Request $request)
    // {
    //     $messages = [
    //         'email.required' => 'Email is required!',
    //         'password.required' => 'Password is required!'
    //     ];
    //     $input = $request->all();

    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);


    //     if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
    //         if (auth()->user()->role == 'super_admin') {
    //             return redirect()->route('super_admin.index');
    //         } elseif (auth()->user()->role == 'kepala_sekolah') {
    //             return redirect()->route('kepala_sekolah.index');
    //         } elseif (auth()->user()->role == 'staf') {
    //             return redirect()->route('staf.index');
    //         } elseif (auth()->user()->role == 'guru') {
    //             return redirect()->route('guru.index');
    //         } elseif (auth()->user()->role == 'orang_tua') {
    //             return redirect()->route('orang.index');
    //         } elseif (auth()->user()->role == 'murid') {
    //             return redirect()->route('murid.index');
    //         }
    //     } else {
    //         dd($input);
    //         return redirect()->route('login.index')
    //             ->with('error', 'Email-Address And Password Are Wrong.');
    //     }
    // }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect('/login');
    }
}
