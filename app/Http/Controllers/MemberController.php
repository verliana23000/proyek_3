<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Member as MemberResources;
use App\MemberModel;
use App\KlinikModel;
use DB;

class MemberController extends Controller
{
    public function index(){

    $datas	= DB::table('member')
    	->join('klinik','klinik.id_klinik', '=', 'klinik.id_klinik')
    	->select('member.*','klinik.*')
    	->get();
    $kliniks = KlinikModel::get();
    return view('admin_klinik.member.member', compact('datas', 'kliniks'));
}

public function create(Request $request){
	$this->validate($request, [
		'nama_member'	=> 'required',
		'ttl'			=> 'required',
		'jk'			=> 'required',
		'no_hp'			=> 'required',
		'email'			=> 'required|unique:member',
		'password'		=> 'required',

	],
	[
		'nama_member'	=> 'Nama Member harus diisi',
		'ttl'			=> 'Alamat Member harus diisi',
		'jk'			=> 'Jenis Kelamin Member harus diisi',
		'no_hp'			=> 'No Hp Member harus diisi',
		'email'			=> 'Email Member harus diisi',
		'password'		=> 'Password Member harus diisi',
		'max'			=> 'Panjang karakter maksimal 100',

	]);

		$data = new MemberModel();

        $data->nama_member	= $request->nama_member;
        $data->ttl 			= $request->ttl;
        $data->jk 			= $request->jk;
        $data->no_hp 		= $request->no_hp;
        $data->email 		= $request->email;
        $data->password 	= $request->password;
        $data->id_klinik	= $request->klinik;

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

	],
	[
		'nama_member'	=> 'Nama Member harus diisi',
		'ttl'			=> 'Alamat Member harus diisi',
		'jk'			=> 'Jenis Kelamin Member harus diisi',
		'no_hp'			=> 'No Hp Member harus diisi',
		'email'			=> 'Email Member harus diisi',
		'password'		=> 'Password Member harus diisi',

		'max'			=> 'Panjang karakter maksimal 100',
	]);

		$data = MemberModel::find($id_member);
        $data->nama_member	= $request->nama_member;
        $data->ttl 			= $request->ttl;
        $data->jk 			= $request->jk;
        $data->no_hp 		= $request->no_hp;
        $data->email 		= $request->email;
        $data->password 	= $request->password;
        $data->id_klinik 	= $request->klinik;

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
