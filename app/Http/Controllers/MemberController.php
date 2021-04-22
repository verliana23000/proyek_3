<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MemberModel;

class MemberController extends Controller
{
    public function index(){
    	
    $datas = MemberModel::all();
    return view('admin_klinik.member.member', compact('datas'));
}

public function create(Request $request){
	$this->validate($request, [
		'nama_member'	=> 'required',
		'ttl'			=> 'required',
		'jk'			=> 'required',
		'no_hp'			=> 'required',
		'email'			=> 'required|unique:member|string',
		'password'		=> 'required',
		//'id_klinik'		=> 'required',
	],
	[
		'nama_member.required'	=> 'Nama Member harus diisi',
		'ttl.required'			=> 'Alamat Member harus diisi',
		'jk.required'			=> 'Jenis Member harus diisi',
		'no_hp.required'		=> 'No Hp Member harus diisi',
		'email.required'		=> 'Email Member harus diisi',
		'password.required'		=> 'Password Member harus diisi',
		//'id_klinik.required'	=> 'Id Klinik harus diisi',
		'max'					=> 'Panjang karakter maksimal 100',

	]);

		$data = new MemberModel();
        $data->id_member	= $request->id_member;
        $data->nama_member	= $request->nama_member;
        $data->ttl 			= $request->ttl;
        $data->no_hp 		= $request->no_hp;
        $data->email 		= $request->email;
        $data->password 	= $request->password;
        //$data->id_klinik	= $request->id_klinik;

        $data->save();
		return redirect()->back()->with('success','Data berhasil ditambah');
}

public function show($id)
{
    //
}

public function update(Request $request, $id)
{
	$this->validate($request, [
		'nama_member'	=> 'required|string',
		'ttl'			=> 'required',
		'jk'			=> 'required',
		'no_hp'			=> 'required',
		'email'			=> 'required|unique:member|string',
		'password'		=> 'required',
		//'id_klinik'		=> 'required',
	],
	[
		'nama_member.required'	=> 'Nama Member harus diisi',
		'ttl.required'			=> 'Alamat Member harus diisi',
		'jk.required'			=> 'Jenis Member harus diisi',
		'no_hp.required'		=> 'No Hp Member harus diisi',
		'email.required'		=> 'Email Member harus diisi',
		'password.required'		=> 'Password Member harus diisi',
		//'id_klinik.required'	=> 'Id Klinik harus diisi',
		'max'					=> 'Panjang karakter maksimal 100',
	]);

		$data = MemberModel::find($id_member);
        $data->id_member	= $request->id_member;
        $data->nama_member	= $request->nama_member;
        $data->ttl 			= $request->ttl;
        $data->no_hp 		= $request->no_hp;
        $data->email 		= $request->email;
        $data->password 	= $request->password;
    $data->save();
	return redirect()->back()->with('success','Data berhasil diubah');
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
