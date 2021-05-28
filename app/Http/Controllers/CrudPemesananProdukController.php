<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PemesananProdukModel;
use App\AdminsModel;
use App\MemberModel;
use App\ProdukModel;
use App\DetailPemesananProdukModel;
use Session;
use Carbon\Carbon;

class CrudPemesananProdukController extends Controller
{
    public function index(){
        if(!Session::get('loginadmin')){
            return redirect('admin_klinik/loginadmin')->with('alert','Anda harus login dulu');
        }
        else{
            $tanggalwaktu = Carbon::now()->isoFormat('dddd, D MMMM Y');
	    	$datas = PemesananProdukModel::all()->sortBy('created_at');
	    	$member = MemberModel::all();

            $now = Carbon::now()->format('y-m-d');
            $batal = PemesananProdukModel::all();

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
                    $updetbatal->ket_batal = 'Obat tidak diambil dalam 24 jam';
                    $updetbatal->save();
                }
        }
        
        return view('admin_klinik/CrudPemesananProduk',compact('datas','member','tanggalwaktu')); 
    }
}

    public function edit($id_pp){
        if(!Session::get('loginadmin')){
            return redirect('admin_klinik/loginadmin')->with('alert','Anda harus login dulu');
        }
        else{

            $datas = PemesananProdukModel::find($id_pp);
            return view('admin_klinik.edit.EditStatusPesanan',compact('datas'));
        }
    }

    public function update($id_pp, Request $request) {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'alpha' => ':attribute harus berupa huruf',
            'image' => ':attribute harus berupa gambar'
        ];

        $this->validate($request, [
            'status' => 'required|max:50'
        ], $messages);

        if ($request->status == 5) {
            $datas = PemesananProdukModel::find($id_pp);
            return view('admin_klinik.BatalPemesanan',compact('datas'));
        }else{
            $data = PemesananProdukModel::find($id_pp);
            $data->id_admin = Session::get('id_admin');
            $data->status = $request->status; 
            $data->save();
            return redirect('admin_klinik/CrudPemesanan')->with('alert-success','Data berhasil diubah!');
        }
    }

    public function delete($id_pp)
    {
        $hapus = PemesananProdukModel::find($id_pp);
        $hapus->delete();
        return redirect('admin_klinik/MengelolaPemesanan')->with('alert-success','Data berhasil dihapus!');
    }

    public function detail($id_pp) {
        if(!Session::get('loginadmin')){
            return redirect('admin_klinik/loginadmin')->with('alert','Anda harus login dulu');
        }
        else{

            $datas = PemesananProdukModel::find($id_pp);
            $obat = ModelObat::all();
            $total = ModelDetailPemesanan::where('$id_pp',$id_pp)->sum('harga_jumlah');
admin_klinik
            return view('admin_klinik.MengelolaDetailPemesanan',compact('datas','obat','total'));
        }
    }

    public function konfirmasi($id_pp) {
        $ambil = PemesananProdukModel::find($id_pp);

        $ambil->status = 3;
        $ambil->id_admin = Session::get('id_admin');
        $ambil->save();

        return redirect('admin_klinik/MengelolaPemesanan')->with('alert-success','Data berhasil dikonfirmasi!');
    }

    public function batalkan($id_pp) {

        if(!Session::get('loginadmin')){
            return redirect('admin_klinik/loginadmin')->with('alert','Anda harus login dulu');
        }
        else{

            $datas = PemesananProdukModel::find($id_pp);
            return view('admin_klinik.BatalPemesanan',compact('datas'));
        }
    }

    public function aksibatal($id_pp, Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'max' => ':attribute diisi maksimal :max karakter',
        ];

        $this->validate($request, [
            'ket_batal' => 'required|max:100'
        ], $messages);

        $batal = PemesananProdukModel::find($id_pp);

        $batal->status = 5;
        $batal->id_admin = Session::get('id_admin');
        $batal->ket_batal = $request->ket_batal; 
        $batal->save();

        return redirect('admin_klinik/MengelolaPemesanan')->with('alert-success','Data berhasil dibatalkan!');
    }

    public function diambil($id_pp) {
        $ambil = PemesananProdukModel::find($id_pp);

        $ambil->status = 4;
        $ambil->id_admin = Session::get('id_admin');
        $ambil->save();

        return redirect('admin_klinik/MengelolaPemesanan')->with('alert-success','Data berhasil diambil!');
    }
}

