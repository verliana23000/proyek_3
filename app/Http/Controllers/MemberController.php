<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Member as MemberResources;
use App\AdminModel;
use App\MemberModel;
use App\KlinikModel;
use Hash;

class MemberController extends Controller{
	
public function tampil(){
	return redirect('/');
}

public function registerMember(Request $request){
	return redirect('/');
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
	return redirect('/');

		}
	}
