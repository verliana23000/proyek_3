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
    public function tampilTreatment(){
        $treatments = TreatmentModel:: all();
        $kliniks    = KlinikModel::get();
        return view('treatment_member', compact('treatments', 'kliniks'));
    }

    public function tampilDetailTreatment($id_treatment){
		$treatments     = TreatmentModel::where('id_treatment', $id_treatment)->first();
		$kliniks        = KlinikModel::get();
        return view('detailTreatment', compact('treatments','kliniks'));
	}
}
