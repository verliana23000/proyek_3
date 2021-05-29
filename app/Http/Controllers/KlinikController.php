<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Klinik as KlinikResources;
use App\KlinikModel;
use App\ProdukModel;
use App\TreatmentModel;
use DB;

class KlinikController extends Controller
{
	public function index(){
	$datas	= KlinikModel::with('produk','treatment')->get();
    $produks = ProdukModel::get();
	$treatments = TreatmentModel::get();

    return view('super_admin.klinik.klinik', compact('datas', 'produks','treatments'));
	}

public function create(Request $request){
	$this->validate($request, [
		'nama_klinik'	=>'required',
		'alamat'		=> 'required',
		'no_hp'			=> 'required',
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
        $data->deskripsi 	= $request->deskripsi;
        
		$file = $request->file('logo'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('admin/img/logo',$nama_file); // isi dengan nama folder tempat kemana file diupload
        $data->logo = $nama_file;
        
	$data->save();
	return redirect()->back()->with('success','Data berhasil ditambah');
}

public function update($id_klinik, Request $request)
{
	$this->validate($request, [
		'nama_klinik'	=>'required|string',
		'alamat'		=> 'required',
		'no_hp'			=> 'required',
		'deskripsi'		=> 'required',
		'logo'			=> 'nullable|max:2048',
	],
	[
		'nama_klinik.required'	=> 'Nama Klinik harus diisi',
		'alamat.required'		=> 'Alamat Klinik harus diisi',
		'no_hp.required'		=> 'No Hp Klinik harus diisi',
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
        
        if (empty($request->logo)){
            $data->logo = $data->logo;
        }
        else
        {
        $file = $request->file('logo'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('admin/img/logo',$nama_file); // isi dengan nama folder tempat kemana file diupload
        $data->logo = $nama_file;
        }
        
	$data->save();
	return redirect()->back()->with('success','Data berhasil ditambah');
}
}
