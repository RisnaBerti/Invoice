<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\Owner\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Admin\SettingAdminController;
use App\Http\Controllers\Owner\SettingOwnerController;
use App\Http\Controllers\Admin\PemasukanAdminController;
use App\Http\Controllers\Owner\PemasukanOwnerController;
use App\Http\Controllers\Admin\PengeluaranAdminController;

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

$controller_path = 'App\Http\Controllers';

Route::get('/', [AuthController::class, 'login']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

//Route Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginAction');
});


//Route Owner
Route::controller(OwnerController::class)->group(function () {
    Route::get('/owner', 'owner')->name('dashboard-owner');
});

//Route Pemasukan Owner
Route::controller(PemasukanOwnerController::class)->group(function () {
    Route::get('/pemasukan-owner', 'index')->name('pemasukan-owner');
    Route::get('/pemasukan-owner/create', 'create')->name('create-pemasukan-owner');
    Route::post('/pemasukan-owner/store', 'store')->name('store-pemasukan-owner');
    Route::get('/pemasukan-owner/edit/{id}', 'edit')->name('edit-pemasukan-owner');
});

//Route Mitra 
Route::controller(MitraController::class)->group(function () {
    Route::get('/mitra-owner', 'index')->name('mitra-owner');
    Route::get('/mitra-owner/create', 'create')->name('create-mitra-owner');
    Route::get('/mitra-owner/edit/{id}', 'edit')->name('edit-mitra-owner');
});

//Route Data User
Route::controller(UserController::class)->group(function () {
    Route::get('/data-user', 'index')->name('data-user');
    Route::get('/data-user/create', 'create')->name('create-data-user');
    Route::get('/data-user/edit/{id}', 'edit')->name('edit-data-user');
});

//Route Pengaturan Owner
Route::controller(SettingOwnerController::class)->group(function () {
    Route::get('/setting-owner', 'index')->name('setting-owner');
    Route::get('/setting-owner/create', 'create')->name('create-setting-owner');
    Route::get('/setting-owner/edit/{id}', 'edit')->name('edit-setting-owner');
});


// ===================================================================================

//Route Admin
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'admin')->name('dashboard-admin');
});

//Route Pemasukan Admin
Route::controller(PemasukanAdminController::class)->group(function () {
    Route::get('/pemasukan-admin', 'index')->name('pemasukan-admin');
    Route::get('/pemasukan-admin/create', 'create')->name('create-pemasukan-admin');
    Route::post('/pemasukan-admin/store', 'store')->name('store-pemasukan-admin');
    Route::get('/pemasukan-admin/edit/{id}', 'edit')->name('edit-pemasukan-admin');
    Route::put('/pemasukan-admin/update/{id}', 'update')->name('update-pemasukan-admin');
    Route::delete('/pemasukan-admin/delete/{id}', 'delete')->name('delete-pemasukan-admin');
});

//Route Pengeluaran Admin
Route::controller(PengeluaranAdminController::class)->group(function () {
    Route::get('/pengeluaran-admin', 'index')->name('pengeluaran-admin');
    Route::get('/pengeluaran-admin/create', 'create')->name('create-pengeluaran-admin');
    Route::post('/pengeluaran-admin/store', 'store')->name('store-pengeluaran-admin');
    Route::get('/pengeluaran-admin/edit/{id}', 'edit')->name('edit-pengeluaran-admin');
    Route::put('/pengeluaran-admin/update/{id}', 'update')->name('update-pengeluaran-admin');
    Route::delete('/pengeluaran-admin/delete/{id}', 'delete')->name('delete-pengeluaran-admin');
});

//Route Pengaturan admin
Route::controller(SettingAdminController::class)->group(function () {
    Route::get('/setting-admin', 'index')->name('setting-admin');
    Route::get('/setting-admin/create', 'create')->name('create-setting-admin');
    Route::get('/setting-admin/edit/{id}', 'edit')->name('edit-setting-admin');
});






