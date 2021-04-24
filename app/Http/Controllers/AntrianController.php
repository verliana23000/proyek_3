<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AntrianModel;
use App\MemberModel;
use App\TreatmentModel;
use DB;

class AntrianController extends Controller
{
    public function index(){
    	$datas	= DB::table('antrian')
   		->join('member','member.id_member', '=', 'member.id_member')
    	->join('treatment','treatment.id_treatment', '=', 'treatment.id_treatment')
    	->select('antrian.*','treatment.*','member.*')
    	->get();
    	$members	= MemberModel::get();
    	$treatments	= TreatmentModel::get();
    	$datas		= AntrianModel::get();
    return view('admin_klinik.antrian.antrian', compact('datas','members','treatments'));

    }
}
