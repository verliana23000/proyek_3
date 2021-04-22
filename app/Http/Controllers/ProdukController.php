<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ProdukModel;
use App\KlinikModel;

class ProdukController extends Controller
{
    public function index(){
    $kliniks 	= KlinikModel::all();
    $datas 		= ProdukModel::all();
    return view('admin_klinik.produk.produk', compact('datas', 'kliniks'));
}

public function create(Request $request){


	$this->validate($request, [
		'nama_produk'	=> 'required',
		'jenis_produk'	=> 'required',
		'harga_produk'	=> 'required|numeric',
		'stok'			=> 'required|numeric',
		'gambar'		=> 'required|max:2048',
	],
	[
		'nama_produk.required'	=> 'Nama Produk harus diisi',
		'jenis_produk.required'	=> 'Jenid Produk harus diisi',
		'harga_produk.regex'	=> 'Harga Produk harus diisi',
		'stok.required'			=> 'Stok harus diisi',
		'gambar.required'		=> 'Gambar Produk harus diisi',
		'max'					=> 'Panjang karakter maksimal 100',
		'gambar.max' 			=> 'Tidak boleh lebih 2 Mb',
		'klinik' 				=> 'Nama Klinik harus diisi',

	]);

	
	$data = new ProdukModel();

        $data->nama_produk	= $request->nama_produk;
        $data->jenis_produk = $request->jenis_produk;
        $data->harga_produk	= $request->harga_produk;
        $data->stok 		= $request->stok;
        
		$file = $request->file('gambar'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('admin/img/gambar_produk',$nama_file); // isi dengan nama folder tempat kemana file diupload
        $data->gambar = $nama_file;
        
        $data->id_klinik = $request->klinik;
        
	$data->save();
	return redirect()->back()->with('success','Data berhasil ditambah');
}


public function update($id_produk, Request $request)
{
	$this->validate($request, [
		'nama_produk'	=> 'required',
		'jenis_produk'	=> 'required',
		'harga_produk'	=> 'required',
		'stok'			=> 'required',
		'gambar'		=> 'required|max:2048',

	],
	[
		'nama_produk.required'	=> 'Nama Produk harus diisi',
		'jenis_produk.required'	=> 'Jenid Produk harus diisi',
		'harga_produk.regex'	=> 'Harga Produk harus diisi',
		'stok.required'			=> 'Stok harus diisi',
		'gambar.required'		=> 'Gambar Produk harus diisi',
		'max'					=> 'Panjang karakter maksimal 100',
		'gambar.max' 			=> 'Tidak boleh lebih 2 Mb',

	]);

		$data = ProdukModel::find($id_produk);
        $data->nama_produk	= $request->nama_produk;
        $data->jenis_produk = $request->jenis_produk;
        $data->harga_produk = $request->harga_produk;
        $data->stok 		= $request->stok;
        
		$file 				= $request->file('gambar'); 
		// menyimpan data gambar yang diupload ke variabel $file

        $nama_file 			= time()."_".$file->getClientOriginalName();
        $file->move('admin/img/gambar_produk',$nama_file); 
        // isi dengan nama folder tempat kemana file diupload

        $data->gambar 		= $nama_file;
        $data->id_klinik	= $request->klinik;

        
	$data->save();
	return redirect()->back()->with('success','Data berhasil ditambah');
}

public function delete($id_produk)
    {
        $data = ProdukModel::findOrFail($id_produk);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
