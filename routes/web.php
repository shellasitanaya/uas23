<?php

use App\Http\Controllers\DetailLogPengirimanController;
use App\Http\Controllers\TransaksiResiPengirimanController;
use App\Http\Controllers\UserAdminController;
use Illuminate\Support\Facades\Route;


Route::get('/login', function () {
    return view('login');
})->name('viewLogin');

Route::get('/index', function () {
    return view('index');
})->name('viewIndex');



// USER ADMIN CONTROLLER
// kirim data form (cek database)
Route::post('/login', [UserAdminController::class, 'login'])->name('loginn');
Route::post('/logout', [UserAdminController::class, 'logout'])->name('logout');



// ADMIN.PHP (NO 3)
// display all admin
Route::get('/admin', [UserAdminController::class, 'getAdmin'])->name('adminn');
// crud admin
Route::post('/admin/create', [UserAdminController::class, 'createAdmin'])->name('admin.create');
Route::post('/admin/update', [UserAdminController::class, 'updateAdmin'])->name('admin.update');
Route::delete('/admin/delete', [UserAdminController::class, 'deleteAdmin'])->name('admin.delete');


// Resi Pengiriman (no 4)
//  get buat view
Route::get('/resi', [TransaksiResiPengirimanController::class, 'getResiPengiriman'])->name('resi'); 

Route::post('/resi/create', [TransaksiResiPengirimanController::class, 'createResi'])->name('resi.create');
Route::delete('/resi/delete', [TransaksiResiPengirimanController::class, 'deleteResi'])->name('resi.delete');
// Route::get('/resi/search', [TransaksiResiPengirimanController::class, 'searchResi'])->name('resi.search');
Route::post('/resi/search', [TransaksiResiPengirimanController::class, 'searchResi'])->name('resi.search');



// Detail Log
Route::get('/resi/entryLog', [DetailLogPengirimanController::class, 'getDetailLog'])->name('resi.entryLog');
Route::post('/resi/entryLog/create', [DetailLogPengirimanController::class, 'createLog'])->name('resi.createLog');
Route::delete('/resi/entryLog/delete', [DetailLogPengirimanController::class, 'deleteLog'])->name('resi.deleteLog');










