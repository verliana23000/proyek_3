<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Member as MemberResources;
use App\MemberModel;
use App\KlinikModel;
use Hash;
use Session;

class MemberController extends Controller{
	
public function index(){
	if(!Session::get('login')){
		return view('Member/DashboardMember');
	}
	else{
		return view('home_member');
	}
}

public function loginMemberPost  (Request $request){
	$email		= $request->email;
	$password	= $request->password;

	$data = MemberModel::where('email',$email)->first();
	if($data){
		if(Hash::check($password,$data->password)){
			Session::put('nama_member',$data->nama_member);
			Session::put('email',$data->email);
			Session::put('id_member',$data->id_member);
			Session::put('loginMemberPost',TRUE);
		return redirect('member/DashboardMember');
	} 
	else {
		
		return view('/')->with('ERROR ! Email atau Password salah !');
	}
}
	else {
		return view('/')->with('ERROR ! Email atau Password salah !');
		
	}
}

public function logoutMember(){
	Session::flush();
	return redirect('/');
}

public function registerMember(Request $request){
	return view('home_member');
}

public function registerMemberPost(Request $request){
	$this->validate($request, [
	'nama_member'	=> 'required',
	'ttl'			=> 'required',
	'jk'			=> 'required',
	'no_hp'			=> 'required',
	'email'			=> 'required',
	'password'		=> 'required',
	'klinik'		=> 'id_klinik',
	],[
		'nama.required'		=> 'Nama harus diisi',
		'ttl.required'		=> 'Tanggal lahir harus diisi',
		'jk.required'		=> 'Jenis Kelamin harus diisi',
		'no_hp.required'	=> 'No Hp harus diisi',
		'email.required'	=> 'Email harus diisi',
		'password.required'	=> 'Password harus diisi'
	]);

	$data = new MemberModel();
	$data->nama_member	= $request->nama_member;
	$data->ttl 			= $request->ttl;
	$data->jk			= $request->jk;
	$data->no_hp 		= $request->no_hp;
	$data->email 		= $request->email;
	$data->password 	= bcrypt($request->password);

	$data->save();
	return redirect('home_member');

		}
	}
