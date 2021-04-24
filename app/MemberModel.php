<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    protected $table		= 'member'; //nama tabel
    protected $primaryKey 	= 'id_member'; //primary key
    protected $fillable		= [
    	'nama_member',
    	'ttl',
    	'jk',
    	'no_hp',
    	'email',
    	'password',
        'id_klinik',
    ]; //field

    public function Klinik(){
        return $this->belongsTo('App\KlinikModel','id_klinik');
    }

    public function PemesananProduk(){
        return $this->hasToMany(PemesananProdukModel::class,'detail_pemesanan_produk', 'id_pp', 'id_produk');
    }

    public function PemesananTreatment(){
        return $this->hasToMany(PemesananProdukModel::class,'detail_pemesanan_treatment', 'id_pt', 'id_treatment');
    }

    public function DetailPemesananProduk(){
        return $this->hasToMany(PemesananProdukModel::class,'detail_pemesanan_treatment', 'id_pt', 'id_treatment');
    }
    


}
