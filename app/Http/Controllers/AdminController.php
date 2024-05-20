<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Mitra;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiItem;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $transaksiSemingguTerakhir = Transaksi::where('created_at', '>=', Carbon::now()->subDays(7));

        $topUsers = User::withSum('transaksis', 'total_barang')
        ->orderBy('transaksis_sum_total_barang', 'desc')
        ->take(10)
        ->get();

        $topProduk = Produk::withSum('transaksiItems', 'jumlah')
        ->orderByDesc('transaksi_items_sum_jumlah')
        ->take(10)
        ->get();

        return view('admin.dashboard', [
            'total_produk' => Produk::all()->count(),
            'total_user' => User::all()->count(),
            'total_pendapatan' => Transaksi::all()->sum('total_barang'),
            'total_pendapatan_seminggu' => $transaksiSemingguTerakhir->sum('total_barang'),
            'produks' => $topProduk,
            'users' => $topUsers,
        ]);
    }

    public function mitra(Request $request) {
        return view('admin.mitra', [
            'mitras' => Mitra::filter(request(['search']))->get(),
        ]);
    }

    public function kategori(Request $request) {
        return view('admin.kategori', [
            'kategoris' =>  KategoriProduk::withCount('produks')->get(),
        ]);
    }
}
