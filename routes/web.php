<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruadmController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KepalaController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\MuridadmController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\OrangController;
use App\Http\Controllers\OrangtuaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfilappController;
use App\Http\Controllers\StafadmController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use App\Models\Kelas;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route Authentic login akses
Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/proseslogin', [AuthController::class, 'proses'])->name('proseslogin.index');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.index');
//jika berhasil akan diarahkan ke route selanjutnya 
//yang sesuai dengan aksesnya : 
//akses=super
Route::middleware(['auth', 'super_admin:admin'])->group(function () {

    Route::group(['prefix' => 'super-admin'], function () {

        Route::get('/index', [SuperController::class, 'index'])->name('super_admin.index');
        Route::resource('users', UserController::class);
        Route::resource('profilapps', ProfilappController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('pegawais', PegawaiController::class);
        Route::resource('orangtuas', OrangtuaController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('mata_pelajarans', MataPelajaranController::class);
        Route::resource('jadwals', JadwalController::class);
        Route::resource('tahuns', TahunController::class);
        Route::resource('murids', MuridController::class);
        Route::get('/rekap', [MuridController::class, 'rekap'])->name('rekapsiswa.index');
        Route::get('/rekap/cetak_pdf', [MuridController::class, 'exportPdf'])->name('exportrekappdf.index');
        Route::post('/rekap/cetak_pdf_per', [MuridController::class, 'exportPdfPer'])->name('exportpdfper.index');
        Route::get('/rekap/cetak_excel', [MuridController::class, 'exportExcel'])->name('exportexcel.index');
        Route::post('/rekap/cetak_excel_per', [MuridController::class, 'exportExcelPer'])->name('exportexcelper.index');
        Route::get('/murid/qrcode/{nis}', [MuridController::class, 'generateQrCode'])->name('murid.qrcode');
        Route::get('/create', [NilaiController::class, 'ikelas'])->name('nilai.index');
        Route::resource('nilais', NilaiController::class);
    });
});
//akses=kepala
Route::middleware(['auth', 'kepala_sekolah:admin'])->group(function () {
    Route::group(['prefix' => 'kepala-sekolah'], function () {
        Route::get('/index', [KepalaController::class, 'index'])->name('kepala_sekolah.index');
    });
});
//akses=staf atau admin
Route::middleware(['auth', 'staf:staf'])->group(function () {
    Route::group(['prefix' => 'staf'], function () {
        Route::get('/index', [StafadmController::class, 'index'])->name('staf.index');
    });
});
//akses=staf atau admin
Route::middleware(['auth', 'guru:guru'])->group(function () {
    Route::group(['prefix' => 'guru'], function () {
        Route::get('/index', [GuruadmController::class, 'index'])->name('guru.index');
    });
});
//akses=staf atau admin
Route::middleware(['auth', 'orang_tua:orang_tua'])->group(function () {
    Route::group(['prefix' => 'orang_tua'], function () {
        Route::get('/index', [OrangController::class, 'index'])->name('orang.index');
    });
});
//akses=staf atau admin
Route::middleware(['auth', 'murid:murid'])->group(function () {
    Route::group(['prefix' => 'murid'], function () {
        Route::get('/index', [MuridadmController::class, 'index'])->name('murid.index');
    });
});
