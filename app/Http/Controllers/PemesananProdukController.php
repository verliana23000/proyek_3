<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PemesananProdukModel;
use App\MemberModel;
use App\KlinikModel;
use App\ProdukModel;
use DB;

class PemesananProdukController extends Controller
{
   	public function index(){
   		$datas	= DB::table('pemesanan_produk')
   		->join('member','member.id_member', '=', 'member.id_member')
    	->join('klinik','klinik.id_klinik', '=', 'klinik.id_klinik')
    	->join('produk','produk.id_produk', '=', 'produk.id_produk')
    	->select('pemesanan_produk.*','klinik.*')
    	->get();
    $members	= MemberModel::all();
    $kliniks	= KlinikModel::all();
    $produks	= ProdukModel::all();
    $datas		= PemesananProdukModel::all();
    return view('admin_klinik.pemesanan_produk.pemesanan_produk', compact('datas','produks','members','kliniks'));
   	}
}
