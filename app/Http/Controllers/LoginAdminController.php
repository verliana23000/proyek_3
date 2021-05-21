<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\AdminsModel;
use App\KlinikModel;
use App\ProdukModel;
use App\TreatmentModel;
use App\MemberModel;

use Hash;
use Session;

class LoginAdminController extends Controller
{
    public function index(){
        if(!Session::get('LoginAdmin')){
            return redirect('/super_admin/loginadmin')->with('alert', 'Kamu harus login dulu');
        } else{
            $admin      = AdminsModel::all();
            $klinik     = KlinikModel::all();
            $produk     = ProdukModel::all();
            $treatment  = TreatmentModel::all();
            $member     = MemberModel::all();

            return view('/super_admin/super_index', compact('admin','klinik','produk','treatment','member'));
        }
    }

    public function login(){
        return view('/super_admin/loginadmin');
    }

    public function loginPost(Request $request){
        $email = $request->email;
        $password = $request->password;

        $data = AdminsModel::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_admin',$data->id_admin);
                Session::put('nama',$data->nama);
                Session::put('email',$data->email);
             
                Session::put('loginadmin',TRUE);
                return redirect('/super_admin/super_index');
            }
            else{
                return redirect('/super_admin/super_index')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('/super_admin/loginadmin')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/super_admin/loginadmin')->with('alert','Kamu sudah logout');
    }
}
