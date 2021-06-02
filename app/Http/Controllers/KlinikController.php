<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Klinik as KlinikResources;
use App\KlinikModel;
use App\ProdukModel;
use App\TreatmentModel;
use App\Http\Controllers\Auth;
use DB;

class KlinikController extends Controller
{

	public function tampil(){
		return view('super_admin.DashboardSuper');
	}

	public function index(){

		$datas = KlinikModel::all();

	$detail	= DB::table('produk')
	->join('klinik','klinik.id_klinik', '=', 'produk.id_klinik')
	//->where( 'klinik','produk.id_klinik', '=','klinik.id_klinik')
	->select('produk.*','klinik.*')
	->get();
		//dd($detail);
    return view('super_admin.klinik.klinik', compact('datas','detail'));
}

	public function create(Request $request){
		$this->validate($request, [
			'nama_klinik'	=>'required',
			'alamat'		=> 'required',
			'no_hp'			=> 'required',
			'email'			=> 'required',
			'password'		=> 'required',
			'deskripsi'		=> 'required',
			'logo'			=> 'required|max:2048',
	],
	[
		'nama_klinik.required'	=> 'Nama Klinik harus diisi',
		'alamat.required'		=> 'Alamat Klinik harus diisi',
		'no_hp.regex'			=> 'No Hp Klinik harus diisi',
		'deskripsi.required'	=> 'Deskripsi Klinik harus diisi',
		'logo.required'			=> 'Logo Klinik harus diisi',
		'max'					=> 'Panjang karakter maksimal 100',
		'logo.max' 				=> 'Tidak boleh lebih 2 Mb',

	]);
	
	
	$data = new KlinikModel();
        $data->id_klinik	= $request->id_klinik;
        $data->nama_klinik	= $request->nama_klinik;
        $data->alamat 		= $request->alamat;
        $data->no_hp 		= $request->no_hp;
		$data->email 		= $request->email;
        $data->password 	= $request->password;
        $data->deskripsi 	= $request->deskripsi;

        
		$file = $request->file('logo'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('admin/img/logo',$nama_file); // isi dengan nama folder tempat kemana file diupload
        $data->logo = $nama_file;
        
	$data->save();
	return redirect()->back()->with('success','Data berhasil ditambah');
}

	public function update($id_klinik, Request $request){
		$this->validate($request, [
			'nama_klinik'	=>'required|string',
			'alamat'		=> 'required',
			'no_hp'			=> 'required',
			'email'			=> 'required',
			'password'		=> 'required',
			'deskripsi'		=> 'required',
			'logo'			=> 'nullable|max:2048',
	],
	[
			'nama_klinik.required'	=> 'Nama Klinik harus diisi',
			'alamat.required'		=> 'Alamat Klinik harus diisi',
			'no_hp.required'		=> 'No Hp Klinik harus diisi',
			'email.required'		=> 'Email harus diisi',
			'password.required'		=> 'Password harus diisi',
			'deskripsi.required'	=> 'Deskripsi Klinik harus diisi',
			'logo.required'			=> 'Logo Klinik harus diisi',
			'max'					=> 'Panjang karakter maksimal 100',
			'logo.max'				=> 'tidak boleh lebih 2 Mb',
	]);

			$data = KlinikModel::find($id_klinik);
			$data->nama_klinik	= $request->nama_klinik;
			$data->alamat 		= $request->alamat;
			$data->no_hp 		= $request->no_hp;
			$data->deskripsi 	= $request->deskripsi;
			$data->email 		= $request->email;
			if (empty($request->logo)){
				$data->logo = $data->logo;
        } else {
			$file = $request->file('logo'); // menyimpan data gambar yang diupload ke variabel $file
			$nama_file = time()."_".$file->getClientOriginalName();
			$file->move('admin/img/logo',$nama_file); // isi dengan nama folder tempat kemana file diupload
			$data->logo = $nama_file;
        }
        
	$data->save();
	return redirect()->back()->with('success','Data berhasil ditambah');
}

public function registerKlinik(Request $request){
		return redirect('/');
}

public function registerKlinikPost(Request $request){
	$this->validate($request, [
		'nama_klinik'	=>'required|string',
		'alamat'		=> 'required',
		'no_hp'			=> 'required',
		'email'			=> 'required',
		'password'		=> 'required',
		'deskripsi'		=> 'required',
		'logo'			=> 'nullable|max:2048',
	],[
		'nama_klinik.required'	=> 'Nama Klinik harus diisi',
		'alamat.required'		=> 'Alamat Klinik harus diisi',
		'no_hp.required'		=> 'No Hp Klinik harus diisi',
		'email.required'		=> 'Email harus diisi',
		'password.required'		=> 'Password harus diisi',
		'deskripsi.required'	=> 'Deskripsi Klinik harus diisi',
		'logo.required'			=> 'Logo Klinik harus diisi',
		'max'					=> 'Panjang karakter maksimal 100',
		'logo.max'				=> 'tidak boleh lebih 2 Mb',
	]);

	$data = new KlinikModel();
        $data->id_klinik	= $request->id_klinik;
        $data->nama_klinik	= $request->nama_klinik;
        $data->alamat 		= $request->alamat;
        $data->no_hp 		= $request->no_hp;
		$data->email 		= $request->email;
        $data->password 	= bcrypt($request->password);
        $data->deskripsi 	= $request->deskripsi;
        
		$file = $request->file('logo'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('/admin/img/logo',$nama_file); // isi dengan nama folder tempat kemana file diupload
        $data->logo = $nama_file;

		$data->save();
		return redirect('/')->with('success','Berhasil daftar');

}

	public function delete($id_klinik)
    {
        $data = KlinikModel::findOrFail($id_klinik);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
