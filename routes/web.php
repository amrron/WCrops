<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(ProdukController::class)->group(function(){
        Route::get('/admin/produk', 'indexAdmin');
        Route::post('/admin/produk', 'store');
        Route::get('/admin/produk/{produk}', 'show');
        Route::post('/admin/produk/{produk}', 'edit');
        Route::delete('/admin/produk/{produk}', 'destroy');
        Route::put('/admin/produk/status/{produk}', 'changeStatus');
    });
});

require __DIR__.'/auth.php';
