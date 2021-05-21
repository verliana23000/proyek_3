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
        return view('treatment_member', compact('treatments'));
    }

    public function tampilDetailTreatment($id_treatment){
		$treatments    = ProdukModel::where('id_treatment', $id_treatment)->first();
		return view('detailTreatment', compact('treatments'));
	}
}
