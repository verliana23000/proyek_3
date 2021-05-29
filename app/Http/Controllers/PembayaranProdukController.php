<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PembayaranProdukModel;
use App\PemesananProdukModel;
use App\MemberModel;
use DB;

class PembayaranProdukController extends Controller
{
    public function index(){
   		$datas	= DB::table('pembayaran_produk')
   		->join('member','member.id_member', '=', 'member.id_member')
    	->join('klinik','klinik.id_klinik', '=', 'klinik.id_klinik')
    	->join('produk','produk.id_produk', '=', 'produk.id_produk')
    	->select('pembayaran_produk.*','klinik.*')
    	->get();
    $members	= MemberModel::all();
    $pps		= PemesananProdukModel::all();
    $datas		= PembayaranProdukModel::all();
    return view('admin_klinik.pembayaran_produk.pembayaran_produk', compact('datas','pps','members'));
   	}

	   public function store( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'harga.digits_between' => ':attribute diisi antara 0 sampai 15 digit',
            'harga.min' => ':attribute tidak boleh kurang dari 0',
            'maks_tiket.min' => 'tiket tidak boleh kurang dari 0',
            'foto.max' => 'tidak boleh lebih 2 Mb'
        ];

    	$this->validate($request, [
    		'id_pemesanan_produk' => 'required|max:100',
    		'nominal' => 'required|max:50',
            'bukti_tf' => 'required|image|max:2048',
    	], $messages);

        $file = $request->file('bukti_tf'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('admin/img/bukti_tf',$nama_file); // isi dengan nama folder tempat kemana file diupload

        $bayar = new ModelPembayaranProduk();
        $bayar->id_pemesanan_produk = $request->id_pemesanan_produk;
        $bayar->nominal = $request->nominal;
        $bayar->status_bayar = 1;
        $bayar->bukti_tf = $nama_file;
    	$bayar->save();

        $pesan = ModelPemesananProduk::find($request->id_pemesanan_produk);
        $pesan->status_pesan = 2;
        $pesan->save();

    	return redirect('/PembayaranProduk'.$request->id_pemesanan_produk)->with('alert-success','Data berhasil ditambahkan!');
    }

}
