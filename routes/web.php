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
Route::get('/kalender_kegiatan/{date}', [HomeController::class, 'kalender_kegiatan'])->name('kalender_kegiatan');

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
    });

    Route::controller(KerjasamaController::class)->prefix('kerjasama')->group(function () {
        Route::get('/', 'index')->name('kerjasama');
        Route::get('/create', 'create')->name('kerjasama.create');
        Route::post('/', 'store')->name('kerjasama.store');
        Route::delete('/{id}', 'destroy')->name('kerjasama.destroy');
        Route::get('/{id}', 'edit')->name('kerjasama.edit');
        Route::post('/{id}', 'update')->name('kerjasama.update');

    });

    Route::controller(usersController::class)->prefix('users')->group(function () {
        Route::get('/', 'index')->name('masters.users');
        Route::get('/create', 'create')->name('masters.users.create');
    });

    Route::controller(DivisionsController::class)->prefix('division')->group(function () {
        Route::get('/', 'index')->name('masters.division');
        Route::get('/create', 'create')->name('masters.division.create');
        Route::post('/', 'store')->name('masters.division.store');
        Route::delete('/{id}', 'destroy')->name('masters.division.destroy');
        Route::get('/{id}', 'edit')->name('masters.division.edit');
        Route::post('/{id}', 'update')->name('masters.division.update');
    });

    Route::controller(PositionsController::class)->prefix('position')->group(function () {
        Route::get('/', 'index')->name('masters.position');
        Route::get('/create', 'create')->name('masters.position.create');
        Route::post('/', 'store')->name('masters.position.store');
        Route::delete('/{id}', 'destroy')->name('masters.position.destroy');
        Route::get('/{id}', 'edit')->name('masters.position.edit');
        Route::post('/{id}', 'update')->name('masters.position.update');
    });

    Route::controller(AttendanceController::class)->prefix('attendance')->group(function () {
        Route::get('/', 'index')->name('absensi.attendance');
        Route::get('/create', 'create')->name('absensi.attendance.create');
        Route::post('/', 'store')->name('absensi.attendance.store');
        Route::delete('/{id}', 'destroy')->name('absensi.attendance.destroy');
        Route::get('/{id}', 'edit')->name('absensi.attendance.edit');
        Route::post('/{id}', 'update')->name('absensi.attendance.update');
    });

    Route::controller(WorkhoursController::class)->prefix('workhours')->group(function () {
        Route::get('/', 'index')->name('absensi.workhours');
        Route::get('/create', 'create')->name('absensi.workhours.create');
        Route::post('/', 'store')->name('absensi.workhours.store');
        Route::delete('/{id}', 'destroy')->name('absensi.workhours.destroy');
        Route::get('/{id}', 'edit')->name('absensi.workhours.edit');
        Route::post('/{id}', 'update')->name('absensi.workhours.update');
    });

    Route::controller(ClocklocationsController::class)->prefix('clocklocations')->group(function () {
        Route::get('/', 'index')->name('absensi.clocklocations');
        Route::get('/create', 'create')->name('absensi.clocklocations.create');
        Route::post('/', 'store')->name('absensi.clocklocations.store');
        Route::delete('/{id}', 'destroy')->name('absensi.clocklocations.destroy');
        Route::get('/{id}', 'edit')->name('absensi.clocklocations.edit');
        Route::post('/{id}', 'update')->name('absensi.clocklocations.update');
    });

    Route::controller(AjaxController::class)->prefix('ajax')->group(function () {
        Route::get('/division/{id}', 'getDivision')->name('ajax.division');
        Route::get('/position/{id}', 'getPosition')->name('ajax.position');
        Route::post('/userValidate', 'userValidate')->name('ajax.uservalidate');
        Route::post('/profilevalidate', 'profilevalidate')->name('ajax.profilevalidate');
    });
});

Route::middleware('Admin:users,superadmin')->group(function () {
    Route::controller(AccountController::class)->group(function () {
        Route::get('/akun', 'index')->name('account');
        Route::get('/kegiatan', 'kegiatan')->name('kegiatan');
        Route::get('/kegiatan/{id}', 'kegiatan_details')->name('kegiatan.details');
        Route::post('/kegiatan/{id}', 'join_kegiatan')->name('kegiatan.join');
        Route::get('/profile', 'index')->name('profile');
    });
});
