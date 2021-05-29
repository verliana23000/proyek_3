<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginSuperController extends Controller
{
    public function index(){
        if(!Session::get('LoginAdmin')){
            return redirect('admin_klinik/loginadmin');
        } 
        else{
            $klinik     = KlinikModel::all();
            $member     = MemberModel::all();
            return view('admin_klinik/index', compact('klinik','member'));
        }
    }

    public function login(){
        return view('admin_klinik/loginadmin');
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
                return redirect('/index');
            }
            else{
                return view('/loginadmin');
            }
        }
        else{
            return view('/loginadmin');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('admin_klinik/loginadmin');
    }
}
