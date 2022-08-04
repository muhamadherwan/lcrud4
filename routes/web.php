<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\LoginController;

use App\Models\Employee;

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
    $jumlahpegawai = Employee::count();
    $jumlahpegawailelaki = Employee::where('jantina','lelaki')->count();
    $jumlahpegawaiperempuan = Employee::where('jantina','perempuan')->count();
    return view('welcome', compact('jumlahpegawai', 'jumlahpegawailelaki', 'jumlahpegawaiperempuan'));
});

Route::group(['middleware' => ['auth', 'hakakses:admin']], function(){

    Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
    Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
    Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');

});

// Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');

// Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai')->middleware('auth');

Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

// Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata')->middleware('auth');

Route::put('/updatedata/{id}', [EmployeeController::class,'updatedata'])->name('updatedata');

Route::delete('/pegawai/{id}', [EmployeeController::class, 'delete'])->name('pegawai.destroy');

Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('pegawai.destroy');

Route::get('/pegawai/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata')->middleware('auth');

Route::get('/login', [LoginController::class,'login'])->name('login');

Route::post('/loginprocess', [LoginController::class,'loginprocess'])->name('loginprocess');

Route::get('/register', [LoginController::class,'register'])->name('register');

Route::post('/registerprocess', [LoginController::class,'registerprocess'])->name('registerprocess');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
