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
use App\Http\Controllers\Owner\PengeluaranOwnerController;

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

// Route::get('/', function () { return view('content', 
//     ['title' => 'Dashboard']

// ); });

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
    // Route::get('/pemasukan-owner', 'index')->name('pemasukan-owner');
    Route::get('/pemasukan-owner', 'dataTables')->name('pemasukan-owner');
    Route::get('/pemasukan-owner/show', 'show')->name('show-pemasukan-owner');
    Route::get('/pemasukan-owner/create', 'create')->name('create-pemasukan-owner');
    Route::post('/pemasukan-owner/store', 'store')->name('store-pemasukan-owner');
    Route::get('/pemasukan-owner/edit/{id}', 'edit')->name('edit-pemasukan-owner');
    Route::post('/pemasukan-owner/update', 'update')->name('update-pemasukan-owner');    
    Route::post('/pemasukan-owner/delete/{id}', 'delete')->name('delete-pemasukan-owner');
});

//Route Pengeluaran Owner
Route::controller(PengeluaranOwnerController::class)->group(function () {
    Route::get('/pengeluaran-owner', 'index')->name('pengeluaran-owner');
    Route::get('/pengeluaran-owner/create', 'create')->name('create-pengeluaran-owner');
    Route::post('/pengeluaran-owner/store', 'store')->name('store-pengeluaran-owner');
    Route::get('/pengeluaran-owner/edit/{id}', 'edit')->name('edit-pengeluaran-owner');
    Route::post('/pengeluaran-owner/update', 'update')->name('update-pengeluaran-owner');
    Route::post('/pengeluaran-owner/delete/{id}', 'delete')->name('delete-pengeluaran-owner');
});

//Route Mitra 
Route::controller(MitraController::class)->group(function () {
    Route::get('/mitra-owner', 'index')->name('mitra-owner');
    Route::get('/mitra-owner/create', 'create')->name('create-mitra-owner');
    Route::post('/mitra-owner/store', 'store')->name('store-mitra-owner');
    Route::get('/mitra-owner/edit/{id}', 'edit')->name('edit-mitra-owner');    
    Route::post('/mitra-owner/update', 'update')->name('update-mitra-owner');
    Route::post('/mitra-owner/delete/{id}', 'delete')->name('delete-mitra-owner');
});

//Route Data User
Route::controller(UserController::class)->group(function () {
    Route::get('/data-user', 'index')->name('data-user');
    Route::get('/data-user/create', 'create')->name('create-data-user');
    Route::post('/data-user/store', 'store')->name('store-data-user');
    Route::get('/data-user/edit/{id}', 'edit')->name('edit-data-user');
    Route::post('/data-user/update', 'update')->name('update-data-user');
    Route::post('/data-user/delete/{id}', 'delete')->name('delete-data-user');  
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
    // Route::get('/pemasukan-admin', 'index')->name('pemasukan-admin');
    Route::get('/pemasukan-admin', 'dataTables')->name('pemasukan-admin');
    Route::get('/pemasukan-admin/show', 'show')->name('show-pemasukan-admin');
    Route::get('/pemasukan-admin/create', 'create')->name('create-pemasukan-admin');
    Route::post('/pemasukan-admin/store', 'store')->name('store-pemasukan-admin');
    Route::get('/pemasukan-admin/edit/{id}', 'edit')->name('edit-pemasukan-admin');
    Route::post('/pemasukan-admin/update', 'update')->name('update-pemasukan-admin');
    Route::post('/pemasukan-admin/delete/{id}', 'delete')->name('delete-pemasukan-admin');
});

//Route Pengeluaran Admin
Route::controller(PengeluaranAdminController::class)->group(function () {
    Route::get('/pengeluaran-admin', 'index')->name('pengeluaran-admin');
    Route::get('/pengeluaran-admin/create', 'create')->name('create-pengeluaran-admin');
    Route::post('/pengeluaran-admin/store', 'store')->name('store-pengeluaran-admin');
    Route::get('/pengeluaran-admin/edit/{id}', 'edit')->name('edit-pengeluaran-admin');
    Route::post('/pengeluaran-admin/update', 'update')->name('update-pengeluaran-admin');
    Route::post('/pengeluaran-admin/delete/{id}', 'delete')->name('delete-pengeluaran-admin');
});

//Route Pengaturan admin
Route::controller(SettingAdminController::class)->group(function () {
    Route::get('/setting-admin', 'index')->name('setting-admin');
    Route::get('/setting-admin/create', 'create')->name('create-setting-admin');
    Route::get('/setting-admin/edit/{id}', 'edit')->name('edit-setting-admin');
});

//Route Mitra 
Route::controller(MitraController::class)->group(function () {
    Route::get('/mitra-admin', 'index')->name('mitra-admin');
    Route::get('/mitra-admin/create', 'create')->name('create-mitra-admin');
    Route::get('/mitra-admin/edit/{id}', 'edit')->name('edit-mitra-admin');
});