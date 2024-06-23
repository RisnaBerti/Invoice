<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Owner\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Admin\SettingAdminController;
use App\Http\Controllers\Owner\SettingOwnerController;
use App\Http\Controllers\Admin\PemasukanAdminController;
use App\Http\Controllers\Owner\PemasukanOwnerController;
use App\Http\Controllers\Admin\PengeluaranAdminController;
use App\Http\Controllers\Admin\ProdukAdminController;
use App\Http\Controllers\Admin\MitraAdminController;
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
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('prevent-direct-logout');
});

//Route Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginAction');
});
Route::get('/lupa-password', [AuthController::class, 'forgotPassword'])->name('lupa-password');
Route::post('/action-lupa-password', [AuthController::class, 'submitForgotPassword'])->name('action-lupa-password');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset-password');
Route::post('/action-reset-password/{token}', [AuthController::class, 'processResetPassword'])->name('action-reset-password');


//Route Owner
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::controller(OwnerController::class)->group(function () {
        Route::get('/owner', 'owner')->name('dashboard-owner');        
        Route::get('/getDataForYearOwner/{year}', 'getDataForYearOwner');
        Route::get('/laporan-pemasukan-owner', 'laporanPemasukanOwner')->name('laporan-pemasukan-owner');
        Route::get('/laporan-pemasukan-owner-show/{id}', 'laporanPemasukanShow')->name('laporan-pemasukan-owner-show');
        Route::get('/laporan-laba-rugi-owner', 'laporanLabaRugiOwner')->name('laporan-laba-rugi-owner');
        Route::get('/laporan-laba-rugi-owner-detail/{bulan_tahun}', 'laporanLabaRugiOwnerDetail')->name('laporan-laba-rugi-owner-detail');

        Route::get('/laporan-owner-harian', 'laporanHarian')->name('laporan-owner-harian');
        Route::get('/laporan-owner-bulanan', 'laporanBulanan')->name('laporan-owner-bulanan');
        Route::get('/sendNotifWhatsApp/{tgl_pemasukan}', 'sendNotifWhatsApp')->name('sendNotifWhatsApp');
        Route::get('/download-pdf', 'downloadPDF')->name('download.pdf');

        Route::get('/laporan-harian-pengeluaran-owner', 'laporanPengeluaran')->name('laporan-harian-pengeluaran-owner');
        Route::get('/laporan-harian-pengeluaran-owner-print', 'laporanPengeluaranPrint')->name('laporan-harian-pengeluaran-owner-print');
        Route::get('/laporan-harian-pemasukan-owner', 'laporanPemasukan')->name('laporan-harian-pemasukan-owner');
        Route::get('/laporan-harian-pemasukan-owner-print', 'laporanPemasukanPrint')->name('laporan-harian-pemasukan-owner-print');
    });

    //Route Pemasukan Owner
    Route::controller(PemasukanOwnerController::class)->group(function () {
        // Route::get('/pemasukan-owner', 'index')->name('pemasukan-owner');
        Route::get('/pemasukan-owner', 'getDataTables')->name('pemasukan-owner');
        Route::get('/pemasukan-owner/show', 'show')->name('show-pemasukan-owner');
        Route::get('/pemasukan-owner-print/show/{id}', 'printShow')->name('show-pemasukan-owner-print');
        Route::get('/pemasukan-owner/create', 'create')->name('create-pemasukan-owner');
        Route::post('/pemasukan-owner/store', 'store')->name('store-pemasukan-owner');
        Route::get('/pemasukan-owner/edit/{id}', 'edit')->name('edit-pemasukan-owner');
        Route::post('/pemasukan-owner/update', 'update')->name('update-pemasukan-owner');
        Route::post('/pemasukan-owner/delete/{id}', 'delete')->name('delete-pemasukan-owner');
    });

    //Route Pengeluaran Owner
    Route::controller(PengeluaranOwnerController::class)->group(function () {
        Route::get('/pengeluaran-owner', 'getDataTables')->name('pengeluaran-owner');
        Route::get('/pengeluaran-owner/create', 'create')->name('create-pengeluaran-owner');
        Route::get('/pengeluaran-owner/show', 'show')->name('show-pengeluaran-owner');
        Route::get('/pengeluaran-owner-print/show/{id}', 'printShow')->name('show-pengeluaran-owner-print');
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

    //Route Produk
    Route::controller(ProdukController::class)->group(function () {
        Route::get('/produk-owner', 'index')->name('produk-owner');
        Route::get('/produk-owner/create', 'create')->name('create-produk-owner');
        Route::post('/produk-owner/store', 'store')->name('store-produk-owner');
        Route::get('/produk-owner/edit/{id}', 'edit')->name('edit-produk-owner');
        Route::post('/produk-owner/update', 'update')->name('update-produk-owner');
        Route::post('/produk-owner/delete/{id}', 'delete')->name('delete-produk-owner');
    });

    //Route Data User
    Route::controller(UserController::class)->group(function () {
        Route::get('/data-user', 'index')->name('data-user');
        Route::get('/data-user/create', 'create')->name('create-data-user');
        Route::post('/data-user/store', 'store')->name('store-data-user');
        Route::get('/data-user/edit/{id}', 'edit')->name('edit-data-user');
        Route::post('/data-user/update', 'update')->name('update-data-user');
        Route::post('/data-user/delete/{id}', 'delete')->name('delete-data-user');
        Route::get('/edit-akun-user/{id}', 'editDataUser')->name('edit-akun-user');
        Route::post('/ganti-akun-user', 'editAkunUser')->name('ganti-akun-user');
        Route::post('/ganti-password-user', 'gantiPasswordUser')->name('ganti-password-user');

        // Route::post('/setting-owner/update', 'update')->name('update-setting-owner');
        // Route::post('/setting-owner/gantiPassword', 'gantiPassword')->name('update-password-owner');

    });

    //Route Pengaturan Owner
    Route::controller(SettingOwnerController::class)->group(function () {
        Route::get('/setting-owner', 'index')->name('setting-owner');
        Route::post('/setting-owner/update', 'update')->name('update-setting-owner');
        Route::post('/setting-owner/gantiPassword', 'gantiPassword')->name('update-password-owner');
    });
});


// ===================================================================================

//Route Admin
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin', 'admin')->name('dashboard-admin');
        Route::get('/getDataForYear/{year}', 'getDataForYear');
        Route::get('/laporan-admin-harian', 'laporanHarian')->name('laporan-admin-harian');
        Route::get('/laporan-admin-bulanan', 'laporanBulanan')->name('laporan-admin-bulanan');
        Route::get('/sendNotifWhatsApp/{tgl_pemasukan}', 'sendNotifWhatsApp')->name('sendNotifWhatsApp');
        Route::get('/download-pdf', 'downloadPDF')->name('download.pdf');
        Route::get('/laporan-pemasukan-admin', 'laporanPemasukanAdmin')->name('laporan-pemasukan-admin');
        Route::get('/laporan-pemasukan-admin-show/{id}', 'laporanPemasukanShow')->name('laporan-pemasukan-admin-show');
        Route::get('/laporan-laba-rugi-admin', 'laporanLabaRugiAdmin')->name('laporan-laba-rugi-admin');
        Route::get('/laporan-laba-rugi-admin-detail/{bulan_tahun}', 'laporanLabaRugiAdminDetail')->name('laporan-laba-rugi-admin-detail');

        Route::get('/laporan-harian-pengeluaran-admin', 'laporanPengeluaran')->name('laporan-harian-pengeluaran-admin');
        Route::get('/laporan-harian-pengeluaran-admin-print', 'laporanPengeluaranPrint')->name('laporan-harian-pengeluaran-admin-print');
        Route::get('/laporan-harian-pemasukan-admin', 'laporanPemasukan')->name('laporan-harian-pemasukan-admin');
        Route::get('/laporan-harian-pemasukan-admin-print', 'laporanPemasukanPrint')->name('laporan-harian-pemasukan-admin-print');
    });

    //Route Pemasukan Admin
    Route::controller(PemasukanAdminController::class)->group(function () {
        Route::get('/pemasukan-admin', 'getDataTables')->name('pemasukan-admin');
        Route::get('/pemasukan-admin/show', 'show')->name('show-pemasukan-admin');
        Route::get('/pemasukan-admin-print/show/{id}', 'printShow')->name('show-pemasukan-admin-print');
        Route::get('/pemasukan-admin/create', 'create')->name('create-pemasukan-admin');
        Route::post('/pemasukan-admin/store', 'store')->name('store-pemasukan-admin');
        Route::get('/pemasukan-admin/edit/{id}', 'edit')->name('edit-pemasukan-admin');
        Route::post('/pemasukan-admin/update', 'update')->name('update-pemasukan-admin');
        Route::post('/pemasukan-admin/delete/{id}', 'delete')->name('delete-pemasukan-admin');
    });

    //Route Pengeluaran Admin
    Route::controller(PengeluaranAdminController::class)->group(function () {
        Route::get('/pengeluaran-admin', 'getDataTables')->name('pengeluaran-admin');
        Route::get('/pengeluaran-admin/create', 'create')->name('create-pengeluaran-admin');
        Route::get('/pengeluaran-admin/show', 'show')->name('show-pengeluaran-admin');
        Route::get('/pengeluaran-admin-print/show/{id}', 'printShow')->name('show-pengeluaran-admin-print');
        Route::post('/pengeluaran-admin/store', 'store')->name('store-pengeluaran-admin');
        Route::get('/pengeluaran-admin/edit/{id}', 'edit')->name('edit-pengeluaran-admin');
        Route::post('/pengeluaran-admin/update', 'update')->name('update-pengeluaran-admin');
        Route::post('/pengeluaran-admin/delete/{id}', 'delete')->name('delete-pengeluaran-admin');
    });

    //Route Pengaturan admin
    Route::controller(SettingAdminController::class)->group(function () {
        Route::get('/setting-admin', 'index')->name('setting-admin');
        Route::post('/setting-admin/update', 'update')->name('update-setting-admin');
        Route::post('/setting-admin/gantiPassword', 'gantiPassword')->name('update-password-admin');
    });

    //Route Produk
    Route::controller(ProdukAdminController::class)->group(function () {
        Route::get('/produk-admin', 'index')->name('produk-admin');
        Route::get('/produk-admin/create', 'create')->name('create-produk-admin');
        Route::post('/produk-admin/store', 'store')->name('store-produk-admin');
        Route::get('/produk-admin/edit/{id}', 'edit')->name('edit-produk-admin');
        Route::post('/produk-admin/update', 'update')->name('update-produk-admin');
        Route::post('/produk-admin/delete/{id}', 'delete')->name('delete-produk-admin');
    });

    //Route Mitra 
    Route::controller(MitraAdminController::class)->group(function () {
        Route::get('/mitra-admin', 'index')->name('mitra-admin');
        Route::get('/mitra-admin/create', 'create')->name('create-mitra-admin');
        Route::post('/mitra-admin/store', 'store')->name('store-mitra-admin');
        Route::get('/mitra-admin/edit/{id}', 'edit')->name('edit-mitra-admin');
        Route::post('/mitra-admin/update', 'update')->name('update-mitra-admin');
        Route::post('/mitra-admin/delete/{id}', 'delete')->name('delete-mitra-admin');
    });
});
