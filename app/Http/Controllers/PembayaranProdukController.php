<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PembayaranProdukModel;
use App\PemesananProdukModel;
use App\MemberModel;
use DB;

class PembayaranProdukController extends Controller
{
    public function index(){
   		$datas	= DB::table('pembayaran_produk')
   		->join('member','member.id_member', '=', 'member.id_member')
    	->join('klinik','klinik.id_klinik', '=', 'klinik.id_klinik')
    	->join('produk','produk.id_produk', '=', 'produk.id_produk')
    	->select('pembayaran_produk.*','klinik.*')
    	->get();
    $members	= MemberModel::all();
    $pps		  = PemesananProdukModel::all();
    $datas		= PembayaranProdukModel::all();
    return view('admin_klinik.pembayaran_produk.pembayaran_produk', compact('datas','pps','members'));
   	}
}
