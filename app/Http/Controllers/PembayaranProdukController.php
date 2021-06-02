<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PembayaranProdukModel;
use App\PemesananProdukModel;
use App\MemberModel;
use DB;

class PembayaranProdukController extends Controller{

    public function index(){
		$datas		= PembayaranProdukModel::all();
		return view('admin_klinik/pemesanan_produk/pembayaran_produk', compact('datas'));
   	}
	
	public function validasiBayar($id_pp){
		$byr 	= PembayaranProdukModel::where('id_pp',$id_pp)->first();
        $sewa 	= PemesananProdukModel::where('id_pp',$id_pp)->first();

        $byr->status = 2;
        $byr->save();

        $sewa->status = 3;
        $sewa->save();

        return redirect('/pemesanan_produk/pembayaran_produk')->with('alert-success','Data berhasil divalidasi!');
	
	}

	public function BayarBatal($id_pp) {
        $byr = PembayaranProdukModel::where('$id_pp',$id_pp)->first();
        $sewa = PemesananProdukModel::find($id_pp)->first();

        $byr->status = 3;
        $byr->save();

        $sewa->status = 1;
        $sewa->save();

        return redirect('/pemesanan_produk/pembayaran_produk')->with('alert-success','Data Pembayaran berhasil dibatalkan!');
	}

	
	
}
