<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MemberModel;
use App\KlinikModel;
use DB;

class CrudMemberController extends Controller
{

	public function tampil(){
		return view('admin_klinik.DashboardAdmin');
}

public function index(){

        $datas		= MemberModel::with('klinik')->get();
       	$kliniks	= KlinikModel::all();
       return view('admin_klinik.member.member', compact('datas', 'kliniks'));
}

public function create(Request $request){


	$this->validate($request, [
		'nama_member'	=> 'required',
	    'ttl'			=> 'required',
	    'jk'			=> 'required',
	    'no_hp'			=> 'required',
	    'email'			=> 'required|unique:member,email',
	    'password'		=> 'required',
	    'klinik'		=> 'required',
	],
	[
		'nama.required'		=> 'Nama harus diisi',
		'ttl.required'		=> 'Tanggal lahir harus diisi',
		'jk.required'		=> 'Jenis Kelamin harus diisi',
		'no_hp.required'	=> 'No Hp harus diisi',
		'email.required'	=> 'Email harus diisi',
		'password.required'	=> 'Password harus diisi'

	]);

	$data = new MemberModel();
	$data->id_klinik	= $request->klinik;
	$data->nama_member	= $request->nama_member;
	$data->ttl 			= $request->ttl;
	$data->jk			= $request->jk;
	$data->no_hp 		= $request->no_hp;
	$data->email 		= $request->email;
	$data->password 	= bcrypt($request->password);
	$data->save();

	return redirect()->back()->with('success', 'Data berhasil ditambah');

    }

    public function delete($id_member)
    {
        $data = MemberModel::findOrFail($id_member);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}