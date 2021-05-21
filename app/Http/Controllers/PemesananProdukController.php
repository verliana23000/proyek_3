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
		return view('detailProduk', compact('produks'));
	}

	
}
