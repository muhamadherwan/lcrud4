<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;

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

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');

Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');

Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');

Route::put('/updatedata/{id}', [EmployeeController::class,'updatedata'])->name('updatedata');

Route::delete('/pegawai/{id}', [EmployeeController::class, 'delete'])->name('pegawai.destroy');

Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('pegawai.destroy');

Route::get('/pegawai/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');


