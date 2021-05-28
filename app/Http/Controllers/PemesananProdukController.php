<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PemesananProdukModel;
use App\DetailPemesananProdukModel;
use App\PembayaranProdukModel;
use App\MemberModel;
use App\KlinikModel;
use App\ProdukModel;
use DB;
use Hash;
use Session;
use Alert;

class PemesananProdukController extends Controller
{
	public function tampilProduk(){
		$produks = ProdukModel::all();
		$kliniks = KlinikModel::get();
		return view('produk_member', compact('produks','kliniks'));
	}
	
	public function tampilDetailProduk($id_produk){
		$produks    = ProdukModel::where('id_produk', $id_produk)->first();
		$kliniks	= KlinikModel::all();
		return view('detailProduk', compact('produks','kliniks'));
	}

	public function riwayat() {
	$pemesanan = PemesananProdukModel::where('id_member', Session::get('id_member'))->where('status','!=',0)->get()->sortBy('status');

	//Proses pembatalan dalam 1 hari
	$now = Carbon::now()->format('y-m-d');
	$selesai = PemesananProdukModel::all();

	foreach ($selesai as $batal) {
		$selisih_hari = $batal->created_at->diffInDays($now);

		if($selisih_hari >= 1 && $batal->status == 1){
			$update_batal = PemesananProdukModel::find($batal->id_pemesanan);
			$update_batal->status = 5;
			$update_batal->save();
		}
	}

	return view('Member/riwayat_Beli', compact('pemesanan','now', 'selesai'));
}

	public function riwayatDetail($id_pp){
        $pemesanan = PemesananProdukModel::where('id_pp', $id_pp)->first();
        //$pembayaran = ModelPembayaran::where('id_pembayaran', $pemesanan->id_pembayaran)->get();
        $pemesanan_detail  = DetailPemesananProdukModel::where('id_pp', $pemesanan->id_pp)->get();
        $total = DetailPemesananProdukModel::where('id_pp', $id_pp)->sum('harga_jumlah');
        $pembayaran = PembayaranProdukModel::get();

        return view('Member/riwayatBeli_detail', compact('pembayaran', 'pemesanan','pemesanan_detail','total' ));
    }
	
}
