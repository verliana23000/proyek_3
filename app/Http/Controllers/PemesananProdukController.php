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

	public function pesanProduk(Request $request, $id_produk)
	{
		$this->validate($request, [
            'jumlah' => 'required|min:1|integer',
        ],[
            'jumlah.required' => '*Harus isi jumlah beli terlebih dahulu',
            'jumlah.min' => '*Tidak boleh kurang dari sama dengan 0',
        ]);

		$produks = ProdukModel::where('id_produk', $id_produk)->first();
		$pemesanan_detail = DetailPemesananProdukModel::all();

		//Validasi Melebihi Stok
		if($request->jumlah > $produks->stok){
            return redirect('detailProduk'.$id_produk)->with('alert', 'Jumlah Beli Melebihi Batas');
		}

		$cek_pemesanan = PemesananProdukModel::where('id_member', Session::get('id_member'))->where('status', 0)->first();
        if(empty($cek_pemesanan)){
            $pemesanan = new PemesananProdukModel;
            $pemesanan->id_member =  Session::get('id_member');
            $pemesanan->status = 0;
            $pemesanan->save();
        }

        $pemesanan_baru = PemesananProdukModel::where('id_member', Session::get('id_member'))->where('status',0)->first();

        $cek_pemesanan_detail = DetailPemesananProdukModel::where('id_produk', $produks->id_produk)->where('id_pp', $pemesanan_baru->id_pp)->first();
        if(empty($cek_pemesanan_detail)){
            $pemesanan_detail = new DetailPemesananProdukModel;
            $pemesanan_detail->id_pp = $pemesanan_baru->id_pp;
            $pemesanan_detail->id_produk = $produks->id_produk;
            $pemesanan_detail->jumlah = $request->jumlah;
            $pemesanan_detail->total = $produks->harga_produk*$request->jumlah;
            $pemesanan_detail->save();
        }else{
            $pemesanan_detail = DetailPemesananProdukModel::where('id_produk', $produks->id_produk)->where('id_pp', $pemesanan_baru->id_pp)->first();
            if($pemesanan_detail->jumlah + $request->jumlah > $produks->stok ){
            	return redirect('detailProduk'.$id_produk)->with('alert', 'Produk Yang Ada Dikeranjang Melebihi ');
			}
            $pemesanan_detail->jumlah = $pemesanan_detail->jumlah+$request->jumlah;

            $harga_pemesanan_detail_baru = $produks->harga_produk * $request->jumlah;
            $pemesanan_detail->total = $pemesanan_detail->total+$harga_pemesanan_detail_baru;
            $pemesanan_detail->update();
        }
            	return redirect('detailProduk'.$id_produk)->with('success', 'Produk Masuk Keranjang');
	}
	public function Keranjang()
	{
		$pemesanan = DetailPemesananProdukModel::all();
		return view('Member/keranjangProduk', compact('pemesanan'));
	}
}
