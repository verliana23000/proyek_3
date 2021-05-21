<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Member as MemberResources;
use App\MemberModel;
use App\KlinikModel;
use DB;
use Hash;
use Session;
use Alert;

class MemberController extends Controller{
	
public function index(){
    return view('Member/DashboardMember');
}

public function loginMemberPost(Request $request){
	$email		= $request->email;
	$password	= $request->password;

	$data = MemberModel::where('email,$email')->first();
	if($data){
		if(Hash::check($password,$data->password)){
			Session::put('nama',$data->nama_member);
			Session::put('email',$data->email);
			Session::put('loginMemberPost',TRUE);
		return redirect('Member/DashboardMember');
	} 
	else {
		alert()->error('Email atau Password Salah', 'Error');
		return redirect('home_member');
	}
}
	else {
		alert()->error('Email atau Password Salah', 'Error');
		return redirect('home_member');
	}
}

public function logoutMember(){
	Session::flush();
	alert()->info('Kamu Sudah Logout', 'Logout');
	return redirect('home_member');
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
	alert()->succes('Kamu Berhasil Daftar');
	return redirect('home_member');

	}
}
