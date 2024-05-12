<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UlasanController;
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
Route::post('/transaksi/status/notification', [TransaksiController::class, 'statusNotification']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return redirect('/');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/setting', 'edit')->name('profile.edit');
        Route::patch('/profile/setting', 'update')->name('profile.update');
        Route::delete('/profile/setting', 'destroy')->name('profile.destroy');

        Route::get('/profile', 'index');
        Route::get('/profile/ulasan', 'ulasan');
    });

    Route::controller(ProdukController::class)->group(function () {
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
        Route::put('/transaksi/status/{transaksi}', 'status');
        Route::put('/transaksi/{transaksi}', 'edit');
        Route::get('/transaksi/track/{transaksi}', 'trackingHistory');
        Route::post('/transaksi/buyagain/{transaksi}', 'buyAgain');
        Route::get('/transaksi/{transaksi}/items', 'getTransaksiItem');
        Route::put('/transaksi/cancel/{transaksi}', 'cancel');
        
        Route::put('/transaksi/delivery/{transaksi}', 'setResi');
    });
    
    Route::controller(UlasanController::class)->group(function () {
        Route::post('/transaksi/ulas/', 'store');
    });
    
    Route::controller(AlamatController::class)->group(function () {
        Route::post('/alamat', 'store');
        Route::put('/alamat', 'changeSelected');
    });
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
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
    });
    
    Route::controller(TransaksiController::class)->group(function () {
        Route::get('/admin/pesanan', 'indexAdmin');
    });
});

require __DIR__ . '/auth.php';
