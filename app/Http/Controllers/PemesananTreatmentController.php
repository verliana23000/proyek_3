<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PemesananTreatmentModel;
use App\MemberModel;
use App\TreatmentModel;
use App\KlinikModel;
use DB;

class PemesananTreatmentController extends Controller
{
    public function index(){
   		$datas	= DB::table('pemesanan_treatment')
   		->join('member','member.id_member', '=', 'member.id_member')
    	->join('klinik','klinik.id_klinik', '=', 'klinik.id_klinik')
    	->join('produk','produk.id_produk', '=', 'produk.id_produk')
    	->select('pemesanan_treatment.*','klinik.*')
    	->get();
    $members	= MemberModel::all();
    $kliniks	= KlinikModel::all();
    $treatments	= TreatmentModel::all();
    $datas		= PemesananTreatmentModel::all();
    return view('admin_klinik.pemesanan_treatment.pemesanan_treatment', compact('datas','treatments','members','kliniks'));
   	}
}
