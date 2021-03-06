<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PemesananProdukModel;
use App\DetailPemesananProdukModel;
use App\PembayaranProdukModel;
use App\MemberModel;
use App\KlinikModel;
use App\ProdukModel;
use DB;
use Carbon\Carbon;

class PemesananProdukController extends Controller
{
	public function index(){
        $data		= auth()->guard('klinik')->user();
		$tanggalwaktu 	= Carbon::now()->isoFormat('dddd, D MMMM Y');
		$datas  		= PemesananProdukModel::all()->sortBy('created_at');
		$member 		= MemberModel::all();

		$now    = Carbon::now()->format('y-m-d');
		$batal  = PemesananProdukModel::all();

		foreach ($batal as $telatbayar) {
				$selisihHari = $telatbayar->created_at->diffInDays($now);

				if ($selisihHari >= 1  && $telatbayar->status == 1) {

					$updetbatal = PemesananProdukModel::find($telatbayar->id_pp);
					$updetbatal->status = 5;
					$updetbatal->ket_batal = 'Tidak melakukan pembayaran dalam 24 jam';
					$updetbatal->save();
				}
		} 

		foreach ($batal as $gkdiambil) {
			$selisihHari = $gkdiambil->created_at->diffInDays($now);

			if ($selisihHari >= 1  && $gkdiambil->status == 3 && $gkdiambil->metode_pembayaran == 2 ) {

				$updetbatal = PemesananProdukModel::find($gkdiambil->id_pp);
				$updetbatal->status = 5;
				$updetbatal->ket_batal = 'Produk tidak diambil dalam 24 jam';
				$updetbatal->save();
			}
		}
		return view('admin_klinik/pemesanan_produk/pemesanan_produk', compact('datas', 'member', 'tanggalwaktu'));
	}

	public function update($id_pp, Request $request){
		$message = [
			'required'  => ':attribute masih kosong',
            'min'       => ':attribute diisi minimal :min karakter',
            'max'       => ':attribute diisi maksimal :max karakter',
            'numeric'   => ':attribute harus berupa angka',
            'unique'    => ':attribute sudah ada',
            'email'     => ':attribute harus berupa email',
            'alpha'     => ':attribute harus berupa huruf',
            'image'     => ':attribute harus berupa gambar'
		];

		$this->validate($request,[
			'status' => 'required|max:50'
		],$message);

		if ($request->status == 5) {
            $datas = PemesananProdukModel::find($id_pp);
            return view('admin_klinik/pemesanan_produk/batalPemesanan',compact('datas'));
        }
        else{
            $datas = PemesananProdukModel::find($id_pp);
            $datas->status = $request->status; 
            $datas->save();
            return redirect('/pemesanan_produk/pemesanan_produk')->with('alert-success','Data berhasil diubah!');
	}
}

    public function delete($id_pp)
    {
        $data = PemesananProdukModel::findOrFail($id_pp);
        try {	
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }

	public function konfirmasi($id_pp) {
        $ambil = PemesananProdukModel::find($id_pp);

        $ambil->status = 3;
        $ambil->save();

        return redirect('/pemesanan_produk/pemesanan_produk')->with('alert-success','Data berhasil dikonfirmasi!');
    }

    public function batalkan($id_pp) {
        $datas = PemesananProdukModel::find($id_pp);
        return view('/pemesanan_produk/batalPemesanan',compact('datas'));
    }

    public function aksibatal($id_pp, Request $request) {

        $messages = [
            'required' 	=> ':attribute masih kosong',
            'max' 		=> ':attribute diisi maksimal :max karakter',
        ];

        $this->validate($request, [
            'ket_batal' => 'required|max:100'
        ], $messages);

        $batal = PemesananProdukModel::find($id_pp);

        $batal->status      = 5;
        $batal->ket_batal   = $request->ket_batal; 
        $batal->save();

        return redirect('/pemesanan_produk/pemesanan_produk')->with('alert-success','Data berhasil dibatalkan!');
    }

    public function diambil($id_pp) {
        $ambil = PemesananProdukModel::find($id_pp);
        $ambil->status = 4;
        $ambil->save();

        return redirect('/pemesanan_produk/pemesanan_produk')->with('alert-success','Data berhasil diambil!');
    }

	public function tampilProduk(){
		$produks = ProdukModel::with('klinik')->get();
		$kliniks = KlinikModel::get();
		return view('produk_member', compact('produks','kliniks'));
	}
	
	public function tampilDetailProduk($id_produk){
		$produks    = ProdukModel::where('id_produk', $id_produk)->first();
		$kliniks	= KlinikModel::all();
		return view('detailProduk', compact('produks','kliniks'));
	}

	public function riwayatDetail($id_pp){
        $pemesanan = PemesananProdukModel::where('id_pp', $id_pp)->first();
        //$pembayaran = ModelPembayaran::where('id_pembayaran', $pemesanan->id_pembayaran)->get();
        $pemesanan_detail  = DetailPemesananProdukModel::where('id_pp', $pemesanan->id_pp)->get();
        $total = DetailPemesananProdukModel::where('id_pp', $id_pp)->sum('harga_jumlah');
        $pembayaran = PembayaranProdukModel::get();

        return view('Member/riwayatBeli_detail', compact('pembayaran', 'pemesanan','pemesanan_detail','total' ));
    }

	public function pesanProduk(Request $request, $id_produk)
	{
		$this->validate($request, [
            'jumlah' => 'required|min:1|integer',
        ],[
            'jumlah.required' => '*Harus isi jumlah beli terlebih dahulu',
            'jumlah.min' => '*Tidak boleh kurang dari sama dengan 0',
        ]);

		$produks = ProdukModel::where('id_produk', $id_produk)->first();
		$pemesanan_detail = DetailPemesananProdukModel::all();

		//Validasi Melebihi Stok
		if($request->jumlah > $produks->stok){
            return redirect('detailProduk'.$id_produk)->with('alert', 'Jumlah Beli Melebihi Batas');
		}

		$cek_pemesanan = PemesananProdukModel::where('id_member', Session::get('id_member'))->where('status', 0)->first();
        if(empty($cek_pemesanan)){
            $pemesanan = new PemesananProdukModel;
            $pemesanan->id_member =  Session::get('id_member');
            $pemesanan->status = 0;
            $pemesanan->save();
        }

        $pemesanan_baru = PemesananProdukModel::where('id_member', Session::get('id_member'))->where('status',0)->first();

        $cek_pemesanan_detail = DetailPemesananProdukModel::where('id_produk', $produks->id_produk)->where('id_pp', $pemesanan_baru->id_pp)->first();
        if(empty($cek_pemesanan_detail)){
            $pemesanan_detail = new DetailPemesananProdukModel;
            $pemesanan_detail->id_pp = $pemesanan_baru->id_pp;
            $pemesanan_detail->id_produk = $produks->id_produk;
            $pemesanan_detail->jumlah = $request->jumlah;
            $pemesanan_detail->total = $produks->harga_produk*$request->jumlah;
            $pemesanan_detail->save();
        }else{
            $pemesanan_detail = DetailPemesananProdukModel::where('id_produk', $produks->id_produk)->where('id_pp', $pemesanan_baru->id_pp)->first();
            if($pemesanan_detail->jumlah + $request->jumlah > $produks->stok ){
            	return redirect('detailProduk'.$id_produk)->with('alert', 'Produk Yang Ada Dikeranjang Melebihi ');
			}
            $pemesanan_detail->jumlah = $pemesanan_detail->jumlah+$request->jumlah;

            $harga_pemesanan_detail_baru = $produks->harga_produk * $request->jumlah;
            $pemesanan_detail->total = $pemesanan_detail->total+$harga_pemesanan_detail_baru;
            $pemesanan_detail->update();
        }
            	return redirect('detailProduk'.$id_produk)->with('success', 'Produk Masuk Keranjang');
	}
	public function Keranjang()
	{
		$pemesanan = DetailPemesananProdukModel::all();
		return view('Member/keranjangProduk', compact('pemesanan'));
	}
}
