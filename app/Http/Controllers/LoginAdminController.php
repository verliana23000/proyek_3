<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\AdminModel;
use App\KlinikModel;
use App\ProdukModel;
use App\TreatmentModel;
use App\MemberModel;

use Hash;
use Session;

class LoginAdminController extends Controller
{
    public function index(){
        if(!Session::get('loginadmin')){
            return redirect('admin_klinik/loginadmin');
        } 
        else{
            $admin      = AdminModel::all();
            $klinik     = KlinikModel::all();
            $produk     = ProdukModel::all();
            $treatment  = TreatmentModel::all();
            $member     = MemberModel::all();
            return redirect('admin_klinik/index', compact('admin','klinik','produk','treatment','member'));
        }
    }

    public function login(){
        return redirect('admin_klinik/loginadmin');
    }

    public function loginAdminPost  (Request $request){
        $email		= $request->email;
        $password	= $request->password;
    
        $data = AdminModel::where('email',$email)->first();
        if($data){
            if(Hash::check($password,$data->password)){
                Session::put('id_admin',$data->id_admin);
                Session::put('nama',$data->nama);
                Session::put('email',$data->email);
                Session::put('password',$data->password);
                Session::put('loginAdminPost',TRUE);
            return redirect('/super_index');
        } 
        else {
            
            return 'salah';
        }
    }
        else {
            return 'gada';
            
        }
    }

    public function logout(){
        Session::flush();
        return redirect('admin_klinik/loginadmin');
    }
}
