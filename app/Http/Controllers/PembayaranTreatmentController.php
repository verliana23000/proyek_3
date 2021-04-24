<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PembayaranTreatmentModel;
use App\PemesananTreatmentModel;
use App\MemberModel;
use DB;

class PembayaranTreatmentController extends Controller
{
    public function index(){
   		$datas	= DB::table('pembayaran_treatment')
   		->join('member','member.id_member', '=', 'member.id_member')
    	->join('klinik','klinik.id_klinik', '=', 'klinik.id_klinik')
    	->join('produk','produk.id_produk', '=', 'produk.id_produk')
    	->select('pembayaran_treatment.*','klinik.*')
    	->get();
    $members	= MemberModel::all();
    $pts		= PemesananTreatmentModel::all();
    $datas		= PembayaranTreatmentModel::all();
    return view('admin_klinik.pembayaran_treatment.pembayaran_treatment', compact('datas','pts','members'));
   	}
}
