<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailPemesananTreatmentController extends Controller
{
    public function tampilPemesananTreatment($id_treatment){
		$treatments     = TreatmentModel::where('id_treatment', $id_treatment)->first();
		$kliniks        = KlinikModel::get();
        return view('PemesananTreatment', compact('treatments','kliniks'));
	}
}
