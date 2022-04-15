<?php

use App\Http\Controllers\LaporanController;
use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengaduanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $title = 'home';
    $pengaduan = Pengaduan::count();
    $proses = Pengaduan::where('status', 'proses')->count();
    $selesai = Pengaduan::where('status', 'selesai')->count();
    $petugas = User::where('level', 'petugas')->count();
    $terkirim = '';

    if (auth()->user() != null && auth()->user()->level == 'masyarakat') {
        $id = auth()->user()->id;
        $pengaduan = Pengaduan::where('user_id', $id)->count();
        $terkirim = Pengaduan::where('user_id', $id)->where('status', 'terkirim')->count();
        $proses = Pengaduan::where('user_id', $id)->where('status', 'proses')->count();
        $selesai = Pengaduan::where('user_id', $id)->where('status', 'selesai')->count();
    }

    return view('home', compact('title', 'pengaduan', 'proses', 'selesai', 'petugas', 'terkirim'));
});

Route::resource('/pengaduan', PengaduanController::class)
    ->except('show')
    ->middleware('public');

Route::resource('/data-user', UserController::class)
    ->except('show', 'create', 'destroy')
    ->middleware('not_public');

Route::group(['middleware' => ['not_public']], function () {
    Route::prefix('laporan')->group(function () {
        Route::get('/', [LaporanController::class, 'index']);
        Route::get('/download', [LaporanController::class, 'download']);
        Route::get('/{id}', [LaporanController::class, 'show']);
        Route::put('/{id}', [LaporanController::class, 'update']);
    });
    Route::get('/download/{id}', function ($id) {
        $data = Pengaduan::where('id', $id)->first();
        $path = public_path('storage/foto_bukti/' . $data->foto);
        return response()->download($path);
    });
});

require __DIR__ . '/auth.php';
