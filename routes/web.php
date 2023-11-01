<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\DivisionsController;
use App\Http\Controllers\Admin\PositionsController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\WorkhoursController;
use App\Http\Controllers\Admin\ClocklocationsController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\UserController;

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

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

//user
Route::get('/',[UserController::class, 'index'])->name('user');


//admin
Route::middleware('Admin')->prefix('admin')->group(function()
{
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
    Route::controller(EmployeeController::class)->prefix('employee')->group(function()
    {
        Route::get('/','index')->name('employee');
        Route::get('/create','create')->name('employee.create');
        Route::post('/','store')->name('employee.store');
    });

    Route::controller(KegiatanController::class)->prefix('kegiatan')->group(function()
    {
        Route::get('/','index')->name('kegiatan');
        Route::get('/create','create')->name('kegiatan.create');
        Route::post('/','store')->name('kegiatan.store');
        Route::delete('/{id}','destroy')->name('kegiatan.destroy');
        Route::get('/{id}','edit')->name('kegiatan.edit');
        Route::post('/{id}','update')->name('kegiatan.update');
        
    });

    Route::controller(usersController::class)->prefix('users')->group(function()
    {
        Route::get('/','index')->name('masters.users');
        Route::get('/create','create')->name('masters.users.create');
    });

    Route::controller(DivisionsController::class)->prefix('division')->group(function()
    {
        Route::get('/','index')->name('masters.division');
        Route::get('/create','create')->name('masters.division.create');
        Route::post('/','store')->name('masters.division.store');
        Route::delete('/{id}','destroy')->name('masters.division.destroy');
        Route::get('/{id}','edit')->name('masters.division.edit');
        Route::post('/{id}','update')->name('masters.division.update');
    });

    Route::controller(PositionsController::class)->prefix('position')->group(function()
    {
        Route::get('/','index')->name('masters.position');
        Route::get('/create','create')->name('masters.position.create');
        Route::post('/','store')->name('masters.position.store');
        Route::delete('/{id}','destroy')->name('masters.position.destroy');
        Route::get('/{id}','edit')->name('masters.position.edit');
        Route::post('/{id}','update')->name('masters.position.update');
    });

    Route::controller(AttendanceController::class)->prefix('attendance')->group(function()
    {
        Route::get('/','index')->name('absensi.attendance');
        Route::get('/create','create')->name('absensi.attendance.create');
        Route::post('/','store')->name('absensi.attendance.store');
        Route::delete('/{id}','destroy')->name('absensi.attendance.destroy');
        Route::get('/{id}','edit')->name('absensi.attendance.edit');
        Route::post('/{id}','update')->name('absensi.attendance.update');
    });

    Route::controller(WorkhoursController::class)->prefix('workhours')->group(function()
    {
        Route::get('/','index')->name('absensi.workhours');
        Route::get('/create','create')->name('absensi.workhours.create');
        Route::post('/','store')->name('absensi.workhours.store');
        Route::delete('/{id}','destroy')->name('absensi.workhours.destroy');
        Route::get('/{id}','edit')->name('absensi.workhours.edit');
        Route::post('/{id}','update')->name('absensi.workhours.update');
    });

    Route::controller(ClocklocationsController::class)->prefix('clocklocations')->group(function()
    {
        Route::get('/','index')->name('absensi.clocklocations');
        Route::get('/create','create')->name('absensi.clocklocations.create');
        Route::post('/','store')->name('absensi.clocklocations.store');
        Route::delete('/{id}','destroy')->name('absensi.clocklocations.destroy');
        Route::get('/{id}','edit')->name('absensi.clocklocations.edit');
        Route::post('/{id}','update')->name('absensi.clocklocations.update');
    });



    Route::controller(AjaxController::class)->prefix('ajax')->group(function()
    {
        Route::get('/division/{id}','getDivision')->name('ajax.division');
        Route::get('/position/{id}','getPosition')->name('ajax.position');
        Route::post('/userValidate','userValidate')->name('ajax.uservalidate');
        Route::post('/profilevalidate','profilevalidate')->name('ajax.profilevalidate');
    });
}
);
