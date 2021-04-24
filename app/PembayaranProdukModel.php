<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranProdukModel extends Model
{
    protected $table		= 'pembayaran_produk'; //nama tabel
    protected $primaryKey 	= 'id_pembayaran_produk'; //primary key
    protected $fillable		= [
    'id_pp',
    'bukti_tf',
    'status'
    ]; //field

    public function PemesananProduk(){
    	return $this->belongsTo(PemesananProdukModel::class,'id_pp');
        
    } 
}
