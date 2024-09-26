<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PemesanController;



Route::get('/login', function(){
    return view('login/login');
})->name('login');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'ListPesanan'])->name('admin.pesanan');
    Route::post('/validasiTiket', [AdminController::class, 'Validasi'])->name('validasiTiket');
    Route::post('/updateData', [AdminController::class, 'UpdateData'])->name('updateData');
    Route::post('/delete', [AdminController::class, 'DeleteData'])->name('delete');
})->middleware('admin');
Route::post('/login', [AdminController::class, 'Login'])->name('admin.login');   
Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout');     

Route::prefix('')->group(function () {
    Route::get('/', [PemesanController::class, 'index']);    
    Route::post('/order', [PemesanController::class, 'PesanTiket'])->name('order.tiket');
    
    Route::get('/berhasil', [PemesanController::class, 'DisplayTiket'])->name('berhasil');
});