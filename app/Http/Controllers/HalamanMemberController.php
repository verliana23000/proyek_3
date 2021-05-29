<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KlinikModel;
use App\ProdukModel;
use App\TreatmentModel;

class HalamanMemberController extends Controller
{
    public function tampil(){
        $klinik	= KlinikModel::all();
        return view('home_member', compact('klinik'));
    
    }

        public function detailProduk(){
            $klinik	= KlinikModel::all();
            return view('home_member', compact('klinik'));
        }
}
