<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\WishlistController;
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

Route::get('/', [HomeController::class, 'home']);
Route::get('/produk', [HomeController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/setting', 'edit')->name('profile.edit');
        Route::patch('/profile/setting', 'update')->name('profile.update');
        Route::delete('/profile/setting', 'destroy')->name('profile.destroy');

        Route::get('/profile', 'index');
    });

    Route::controller(ProdukController::class)->group(function () {
        Route::get('/admin/produk', 'indexAdmin');
        Route::get('/admin/produk/name', 'getProductName');
        Route::delete('/admin/produk/delete', 'deleteSelected');
        Route::post('/admin/produk', 'store');
        Route::get('/admin/produk/{produk}', 'show');
        Route::post('/admin/produk/{produk}', 'edit');
        Route::delete('/admin/produk/{produk}', 'destroy');
        Route::put('/admin/produk/status/{produk}', 'changeStatus');
        Route::put('/admin/produk/status/', 'nonactiveStatus');
        Route::get('/produk/{produk:slug}', 'show');
    });

    Route::controller(KeranjangController::class)->group(function () {
        Route::get('/keranjang', 'index');
        Route::post('/keranjang', 'store');
        Route::delete('/keranjang/{keranjang}', 'destroy');
        Route::delete('/keranjang', 'destroySelected');
        Route::patch('/keranjang/{keranjang}', 'decrease');
        Route::put('/keranjang/{keranjang}', 'update');
    });

    Route::controller(WishlistController::class)->group(function () {
        Route::get('/wishlist', 'index');
        Route::post('/wishlist', 'store');
        Route::delete('/wishlist/{wishlist}', 'destroy');
    });

    Route::controller(TransaksiController::class)->group(function () {
        Route::post('/transaksi', 'store');
        Route::get('/transaksi', 'index');
        Route::get('/keranjang/checkout', 'checkoutIndex');
        Route::post('/transaksi/bayar', 'pay');
        Route::get('/transaksi/status/{transaksi}', 'status');
        Route::put('/transaksi/{transaksi}', 'edit');
        Route::get('/transaksi/track/{transaksi}', 'trackingHistory');

        Route::get('/admin/transaksi', 'indexAdmin');
        Route::put('/transaksi/delivery/{transaksi}', 'setResi');
    });

    Route::controller(AlamatController::class)->group(function () {
        Route::post('/alamat', 'store');
        Route::put('/alamat', 'changeSelected');
    });
});

require __DIR__ . '/auth.php';
