<?php

use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\ClocklocationsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DivisionsController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\KerjasamaController;
use App\Http\Controllers\Admin\PositionsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\WorkhoursController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\AccountController;
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

Route::middleware('Admin')->get('/', function () {
    return view('welcome');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('register.store');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

//user
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pengumuman', [HomeController::class, 'pengumuman'])->name('pengumuman');
Route::get('/pengumuman/{id}', [HomeController::class, 'detail_pengumuman'])->name('pengumuman.details');
Route::get('/berita/{id}', [HomeController::class, 'detail_berita'])->name('berita');
Route::get('/kalender_kegiatan/{date}', [HomeController::class, 'kalender_kegiatan'])->name('kalender_kegiatan');
Route::get('/pengumuman/{file}/download', [HomeController::class, 'downloadPengumuman'])->name('download_pengumuman');


Route::controller(AjaxController::class)->prefix('ajax')->group(function () {
    Route::get('/division/{id}', 'getDivision')->name('ajax.division');
    Route::get('/position/{id}', 'getPosition')->name('ajax.position');
    Route::post('/userValidate', 'userValidate')->name('ajax.uservalidate');
    Route::post('/profilevalidate', 'profilevalidate')->name('ajax.profilevalidate');
});

//admin
Route::middleware('Admin:admin,superadmin')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::controller(EmployeeController::class)->prefix('employee')->group(function () {
        Route::get('/', 'index')->name('employee');
        Route::get('/create', 'create')->name('employee.create');
        Route::post('/', 'store')->name('employee.store');
    });

    Route::controller(KegiatanController::class)->prefix('kegiatan')->group(function () {
        Route::get('/', 'index')->name('admin.kegiatan');
        Route::get('/create', 'create')->name('admin.kegiatan.create');
        Route::post('/', 'store')->name('admin.kegiatan.store');
        Route::delete('/{id}', 'destroy')->name('admin.kegiatan.destroy');
        Route::get('/{id}', 'edit')->name('admin.kegiatan.edit');
        Route::post('/{id}', 'update')->name('admin.kegiatan.update');
        Route::get('/{id}/peserta', 'peserta')->name('admin.kegiatan.peserta');
        Route::get('/{id}/sertifikat', 'sertifikat')->name('admin.kegiatan.sertifikat');
        Route::get('/{id}/sertifikat/tambah', 'sertifikatAdd')->name('admin.kegiatan.sertifikat.add');
        Route::get('/{id}/sertifikat/edit', 'sertifikatEdit')->name('admin.kegiatan.sertifikat.edit');
        Route::post('/{id}/sertifikat/tambah', 'sertifikatStore')->name('admin.kegiatan.sertifikat.store');
        Route::post('/{id}/sertifikat/update', 'sertifikatUpdate')->name('admin.kegiatan.sertifikat.update');
        Route::post('/export/excel', 'export')->name('admin.kegiatan.export');
    });

    Route::controller(KerjasamaController::class)->prefix('kerjasama')->group(function () {
        Route::get('/', 'index')->name('kerjasama');
        Route::get('/create', 'create')->name('kerjasama.create');
        Route::post('/', 'store')->name('kerjasama.store');
        Route::delete('/{id}', 'destroy')->name('kerjasama.destroy');
        Route::get('/{id}', 'edit')->name('kerjasama.edit');
        Route::post('/{id}', 'update')->name('kerjasama.update');
    });

    Route::controller(KerjasamaController::class)->prefix('pengajuan')->group(function () {
        Route::get('/', 'pengajuan')->name('pengajuan');
        Route::post('/accept/{id}', 'pengajuan_accept')->name('pengajuan.accept');
        Route::post('/reject/{id}', 'pengajuan_reject')->name('pengajuan.reject');
    });

    Route::controller(BeritaController::class)->prefix('berita')->group(function () {
        Route::get('/', 'index')->name('admin.berita');
        Route::get('/create', 'create')->name('admin.berita.create');
        Route::post('/', 'store')->name('admin.berita.store');
        Route::delete('/{id}', 'destroy')->name('admin.berita.destroy');
        Route::get('/{id}', 'edit')->name('admin.berita.edit');
        Route::post('/{id}', 'update')->name('admin.berita.update');
    });

    Route::controller(GalleryController::class)->prefix('gallery')->group(function () {
        Route::get('/', 'index')->name('admin.gallery');
        // Route::get('/create', 'create')->name('admin.gallery.create');
        Route::post('/', 'store')->name('admin.gallery.store');
        Route::delete('/{id}', 'destroy')->name('admin.gallery.destroy');
        Route::get('/{id}', 'edit')->name('admin.gallery.edit');
        Route::post('/{id}', 'update')->name('admin.gallery.update');
    });

    Route::controller(PengumumanController::class)->prefix('pengumuman')->group(function () {
        Route::get('/', 'index')->name('admin.pengumuman');
        // Route::get('/create', 'create')->name('admin.pengumuman.create');
        Route::post('/', 'store')->name('admin.pengumuman.store');
        Route::delete('/{id}', 'destroy')->name('admin.pengumuman.destroy');
        Route::get('/{id}', 'edit')->name('admin.pengumuman.edit');
        Route::post('/{id}', 'update')->name('admin.pengumuman.update');
    });

    Route::controller(UsersController::class)->prefix('users')->group(function () {
        Route::get('/', 'index')->name('admin.users');
        Route::post('/{id}/status', 'destroy')->name('admin.users.status');
    });

    Route::controller(UsersController::class)->prefix('administrator')->group(function () {
        Route::get('/', 'admin')->name('admin.admin');
        Route::get('/create', 'create')->name('admin.admin.create');
        Route::post('/', 'store')->name('admin.admin.store');
        Route::post('/{id}/status', 'destroy')->name('admin.admin.status');
        Route::get('/{id}', 'edit')->name('admin.admin.edit');
        Route::post('/{id}', 'update')->name('admin.admin.update');
    });

   
});

Route::middleware('Admin:users,superadmin')->group(function () {
    Route::controller(AccountController::class)->group(function () {
        Route::get('/akun', 'index')->name('account');
        Route::get('/kegiatan', 'kegiatan')->name('kegiatan');
        Route::get('/kegiatan/{id}', 'kegiatan_details')->name('kegiatan.details');
        Route::post('/kegiatan/{id}', 'join_kegiatan')->name('kegiatan.join');
        Route::get('/profile', 'profile')->name('profile');
        Route::post('/profile', 'update_profile')->name('profile.update');
        Route::post('/asn_data', 'update_asn_data')->name('asn_data.update');
        Route::post('/user_data', 'update_user_data')->name('user_data.update');
        Route::get('/sertifikat/{id}', 'sertifikat')->name('sertifikat');
        Route::get('/kerjasama', 'kerjasama_index')->name('user_kerjasama');
        Route::get('/kerjasama/new', 'kerjasama_create')->name('user_kerjasama.create');
        Route::post('/kerjasama', 'kerjasama_post')->name('user_kerjasama.post');

    });

    Route::controller(AjaxController::class)->prefix('ajax')->group(function () {
        Route::get('/kabupaten', 'getKabupaten')->name('ajax.kabupaten');
        Route::get('/kecamatan', 'getKecamatan')->name('ajax.kecamatan');
        Route::get('/desa', 'getDesa')->name('ajax.desa');
    });
});
