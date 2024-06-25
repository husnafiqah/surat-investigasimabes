<?php

use App\Http\Controllers\BuatSuratController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:user'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/user/transaksiSK', [SuratKeluarController::class, 'usertransaksiSK'])->name('user.transaksiSK');
    Route::get('/user/transaksiSM', [SuratMasukController::class, 'usertransaksiSM'])->name('user.transaksiSM');
    Route::get('/user/bukuSM', [SuratMasukController::class, 'userbukuSM'])->name('user.bukuSM');
    Route::get('/user/bukuSK', [SuratKeluarController::class, 'userbukuSK'])->name('user.bukuSK');
    Route::get('/user/detailSM/{id}', [SuratMasukController::class, 'userdetailSM'])->name('user.detailSM');
    Route::get('/user/detailSK/{id}', [SuratKeluarController::class, 'userdetailSK'])->name('user.detailSK');
    Route::get('/user/tambahSM', [SuratMasukController::class, 'usertambahSM'])->name('user.tambahSM');
    Route::get('/user/tambahSK', [SuratKeluarController::class, 'usertambahSK'])->name('user.tambahSK');
    Route::post('/user/tambahSM/simpan', [SuratMasukController::class, 'userStore'])->name('user.simpanSM');
    Route::get('/user/disposisi/{id}', [SuratMasukController::class, 'userDisposisi'])->name('user.disposisi');
    Route::get('/user/suratMasuk/{id}/edit', [SuratMasukController::class, 'userEdit'])->name('user.editSM');
    Route::put('/user/suratMasuk/{id}', [SuratMasukController::class, 'userUpdate'])->name('user.updateSM');
    Route::delete('/user/suratMasuk/{id}', [SuratMasukController::class, 'userDelete'])->name('user.deleteSM');
    Route::post('user/simpanSurat', [BuatSuratController::class, 'userStore'])->name('user.simpanSurat');
    Route::get('user/generate/{id}', [BuatSuratController::class, 'user_generateDocument'])->name('user.generate');
    Route::get('/user/buatsurat', [BuatSuratController::class, 'userBuatsurat'])->name('user.buatsurat');
    Route::get('/user/bukuSM/export', [SuratMasukController::class, 'export'])->name('user.bukuSM.export');
    Route::get('/user/bukuSK/export', [SuratKeluarController::class, 'export'])->name('user.bukuSK.export');
    Route::get('/profile', [PenggunaController::class, 'userProfile'])->name('user.profile');
    Route::post('/profile/update', [PenggunaController::class, 'userUpdate'])->name('user.profile.update');
    Route::post('/profile/change-password', [PenggunaController::class, 'userChangePassword'])->name('user.profile.changePassword');

});

Route::middleware(['auth', 'user-access:admin'])->group(function() {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/pengguna', [PenggunaController::class, 'pengguna'])->name('pengguna');
    Route::get('/admin/tambahpengguna', [PenggunaController::class, 'tambahPengguna'])->name('tambahPengguna');
    Route::post('/admin/pengguna/simpan', [PenggunaController::class, 'store'])->name('simpanPengguna');
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'editPengguna'])->name('editPengguna');
    Route::post('pengguna/updatepass/{id}', [PenggunaController::class, 'updatePassword'])->name('updatePassword');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'updatePengguna'])->name('updatePengguna');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'hapusPengguna'])->name('hapusPengguna');
    Route::get('/admin/transaksiSM', [SuratMasukController::class, 'admintransaksiSM'])->name('admin.transaksiSM');
    Route::get('/admin/transaksiSK', [SuratKeluarController::class, 'admintransaksiSK'])->name('admin.transaksiSK');
    Route::get('/admin/bukuSM', [SuratMasukController::class, 'adminbukuSM'])->name('admin.bukuSM');
    Route::get('/admin/bukuSK', [SuratKeluarController::class, 'adminbukuSK'])->name('admin.bukuSK');
    Route::get('/admin/detailSM/{id}', [SuratMasukController::class, 'admindetailSM'])->name('admin.detailSM');
    Route::get('/admin/detailSK/{id}', [SuratKeluarController::class, 'admindetailSK'])->name('admin.detailSK');
    Route::get('/admin/tambahSM', [SuratMasukController::class, 'admintambahSM'])->name('admin.tambahSM');
    Route::post('/admin/tambahSM/simpan', [SuratMasukController::class, 'adminStore'])->name('simpanSuratMasuk');
    Route::get('/admin/tambahSK', [SuratKeluarController::class, 'admintambahSK'])->name('admin.tambahSK');
    Route::post('/admin/tambahSK/simpan', [SuratKeluarController::class, 'adminStore'])->name('simpanSuratKeluar');
    Route::post('/simpanSurat', [BuatSuratController::class, 'adminStore'])->name('simpanSurat');
    Route::get('/generate/{id}', [BuatSuratController::class, 'generateDocument'])->name('generate');
    Route::get('/admin/suratMasuk/{id}/edit', [SuratMasukController::class, 'adminEdit'])->name('admin.editSM');
    Route::put('/admin/suratMasuk/{id}', [SuratMasukController::class, 'adminUpdate'])->name('admin.updateSM');
    Route::delete('/admin/suratMasuk/{id}', [SuratMasukController::class, 'adminDelete'])->name('admin.deleteSM');
    Route::get('/admin/suratKeluar/{id}/edit', [SuratKeluarController::class, 'adminEdit'])->name('admin.editSK');
    Route::put('/admin/suratKeluar/{id}', [SuratKeluarController::class, 'adminUpdate'])->name('admin.updateSK');
    Route::delete('/admin/suratKeluar/{id}', [SuratKeluarController::class, 'adminDelete'])->name('admin.deleteSK');
    Route::get('/admin/generate-pdf/{id}', [SuratKeluarController::class, 'generateSuratKeluarPDF'])->name('admin.generatePDF');
    Route::get('/admin/buatsurat', [BuatSuratController::class, 'adminBuatsurat'])->name('admin.buatsurat');
    Route::get('letter/download/{id}', [SuratMasukController::class, 'download_SM'])->name('download.SM');
    Route::get('/admin/disposisi/{id}', [SuratMasukController::class, 'adminDisposisi'])->name('admin.disposisi');
    Route::get('/admin/disposisi/create/{id}', [SuratMasukController::class, 'admin_createDisposisi'])->name('admin.disposisi.create');
    Route::post('/admin/disposisi/store/{id}', [SuratMasukController::class, 'admin_storeDisposisi'])->name('admin.storeDisposisi');
    Route::get('admin/disposisi/{id}/edit', [SuratMasukController::class, 'admin_editDisposisi'])->name('admin.disposisi.edit');
    Route::put('admin/disposisi/{id}', [SuratMasukController::class, 'admin_updateDisposisi'])->name('admin.disposisi.update');
    Route::delete('admin/disposisi/{id}', [SuratMasukController::class, 'admin_destroyDisposisi'])->name('admin.disposisi.destroy');
    Route::get('/admin/bukuSM/export', [SuratMasukController::class, 'export'])->name('admin.bukuSM.export');
    Route::get('/admin/bukuSK/export', [SuratKeluarController::class, 'export'])->name('admin.bukuSK.export');
    Route::get('/profile', [PenggunaController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [PenggunaController::class, 'update'])->name('profile.update');
    Route::post('/profile/change-password', [PenggunaController::class, 'changePassword'])->name('profile.changePassword');

});

Route::middleware(['auth', 'user-access:kepala'])->group(function() {
    Route::get('/kepala/home', [HomeController::class, 'kepalaHome'])->name('kepala.home');
    Route::get('/kepala/transaksiSM', [SuratMasukController::class, 'kepalatransaksiSM'])->name('kepala.transaksiSM');
    Route::get('/kepala/transaksiSK', [SuratKeluarController::class, 'kepalatransaksiSK'])->name('kepala.transaksiSK');
    Route::get('/kepala/detailSK/{id}', [SuratKeluarController::class, 'kepaladetailSK'])->name('kepala.detailSK');
    Route::get('/kepala/detailSM/{id}', [SuratMasukController::class, 'kepaladetailSM'])->name('kepala.detailSM');
    Route::get('/kepala/disposisi/{id}', [SuratMasukController::class, 'kepala_disposisi'])->name('kepala.disposisi');
    Route::get('/kepala/disposisi/create/{id}', [SuratMasukController::class, 'kepala_createDisposisi'])->name('kepala.disposisi.create');
    Route::get('/kepala/bukuSM', [SuratMasukController::class, 'kepalabukuSM'])->name('kepala.bukuSM');
    Route::get('/kepala/bukuSK', [SuratKeluarController::class, 'kepalabukuSK'])->name('kepala.bukuSK');
    Route::post('/kepala/disposisi/store/{id}', [SuratMasukController::class, 'kepala_storeDisposisi'])->name('kepala.storeDisposisi');
    Route::delete('kepala/disposisi/{id}', [SuratMasukController::class, 'destroyDisposisi'])->name('kepala.disposisi.destroy');
    Route::get('kepala/disposisi/{id}/edit', [SuratMasukController::class, 'editDisposisi'])->name('kepala.disposisi.edit');
    Route::put('kepala/disposisi/{id}', [SuratMasukController::class, 'updateDisposisi'])->name('kepala.disposisi.update');
    Route::get('/kepala/bukuSM/export', [SuratMasukController::class, 'export'])->name('kepala.bukuSM.export');
    Route::get('/kepala/bukuSK/export', [SuratKeluarController::class, 'export'])->name('kepala.bukuSK.export');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});






