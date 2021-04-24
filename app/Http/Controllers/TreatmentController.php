<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TreatmentModel;
use App\KlinikModel;
use DB;

class TreatmentController extends Controller
{
    public function index(){
    	$datas	= DB::table('treatment')
    	->join('klinik','klinik.id_klinik', '=', 'klinik.id_klinik')
    	->select('treatment.*','klinik.*')
    	->get();
    return view('admin_klinik.treatment.treatment', compact('datas'))->with('i');

    $kliniks	= KlinikModel::all();
    $datas 		= TreatmentModel::all();
    return view('admin_klinik.treatment.treatment', compact('datas'));

}


public function create(Request $request){


	$this->validate($request, [
		'nama_treatment'	=> 'required',
		'jenis_treatment'	=> 'required',
		'harga_treatment'	=> 'required|numeric',
		'gambar'			=> 'required|max:2048',
	],
	[
		'nama_treatment.required'	=> 'Nama Produk harus diisi',
		'jenis_treatment.required'	=> 'Jenid Produk harus diisi',
		'harga_treatment.regex'		=> 'Harga Produk harus diisi',
		'stok.required'				=> 'Stok harus diisi',
		'gambar.required'			=> 'Gambar Produk harus diisi',
		'max'						=> 'Panjang karakter maksimal 100',
		'gambar.max' 				=> 'Tidak boleh lebih 2 Mb',


	]);

	
	$data = new TreatmentModel();

        $data->nama_treatment	= $request->nama_treatment;
        $data->jenis_treatment 	= $request->jenis_treatment;
        $data->harga_treatment	= $request->harga_treatment;
        
		$file = $request->file('gambar'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('admin/img/gambar_produk/',$nama_file); // isi dengan nama folder tempat kemana file diupload
        $data->gambar 		= $nama_file;
        $data->id_klinik 	= $request->klinik;
                
	$data->save();
	return redirect()->back()->with('success','Data berhasil ditambah');
}


public function update($id_produk, Request $request)
{
	$this->validate($request, [
		'nama_treatment'	=> 'required',
		'jenis_treatment'	=> 'required',
		'harga_treatment'	=> 'required',
		'gambar'		=> 'required|max:2048',

	],
	[
		'nama_treatment.required'	=> 'Nama Produk harus diisi',
		'jenis_treatment.required'	=> 'Jenid Produk harus diisi',
		'harga_treatment.regex'	=> 'Harga Produk harus diisi',
		'gambar.required'		=> 'Gambar Produk harus diisi',
		'max'					=> 'Panjang karakter maksimal 100',
		'gambar.max' 			=> 'Tidak boleh lebih 2 Mb',

	]);

		$data = TreatmentModel::find($id_treatment);
        $data->nama_treatment	= $request->nama_treatment;
        $data->jenis_treatment 	= $request->jenis_treatment;
        $data->harga_treatment 	= $request->harga_treatment;
        
        if (empty($request->gambar)) {
        	$data->gambar = $data->gambar;
        } else {
        	unlink('admin/img/gambar_produk/'.$nama_file['gambar']);
        	$file 				= $request->file('gambar'); 
			// menyimpan data gambar yang diupload ke variabel $file
	        $nama_file 			= time()."_".$file->getClientOriginalName();
	        $file->move('admin/img/gambar_produk/',$nama_file); 
	        // isi dengan nama folder tempat kemana file diupload
	        $data->gambar 		= $nama_file;
        }

        $data->id_klinik 	= $request->klinik;

        
	$data->save();
	return redirect()->back()->with('success','Data berhasil ditambah');
}

public function delete($id_treatment)
    {
        $data = TreatmentModel::findOrFail($id_treatment);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}