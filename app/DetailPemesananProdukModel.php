<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPemesananProdukModel extends Model
{
    protected $table		= 'detail_pemesanan_produk'; //nama tabel
    protected $primaryKey 	= 'id_detail_pp'; //primary key
    protected $fillable		= [
    'id_pp',
    'id_produk',
    'jumlah',
    'total'
    ]; //field 

    public function Produk(){
    	return $this->belongsTo(ProdukModel::class, 'id_produk');
    }

    public function PemesananProduk(){
    	return $this->belongsTo(PemesananProdukModel::class,'id_pp');
        
    }
}
