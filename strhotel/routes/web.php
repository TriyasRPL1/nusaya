<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;

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

Route::get('about', function () {
    return view('about');
});
Route::resource('room', RoomController::class);
Route::resource('room', aboutController::class);
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::post('upload', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');
Route::middleware('auth', 'check_admin')->group(function () { //grouping route
    Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    // fasilitashotel
    Route::resource('room', RoomController::class);
    Route::resource('about', aboutController::class);
    Route::resource('contact', ContactController::class);
    // Route::resource('login', LoginController::class);
    Route::get('/admin/fasilitashotel', [App\Http\Controllers\AdminController::class, 'fasilitashotelindex'])->name('admin.fasilitas.index');
    Route::post('/admin/fasilitashotel/upload', [App\Http\Controllers\AdminController::class, 'upload_fasilitashotel'])->name('admin.fasilitas.upload');
    Route::get('/admin/fasilitashotel/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit_fasilitashotel'])->name('admin.fasilitas.edit');
    Route::patch('/admin/fasilitashotel/update', [App\Http\Controllers\AdminController::class, 'update_fasilitashotel'])->name('admin.fasilitas.update');
});

// Route::get('/login',[App\Http\Controllers\Auth\LoginController::class, 'loginPage'])->name('login');
// Route::post('/login',[App\Http\Controllers\Auth\LoginController::class, 'loginProcess'])->name('login');
// Route::post('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
