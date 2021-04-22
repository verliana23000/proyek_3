<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemesananProdukModel extends Model
{
  	protected $table		= 'pemesanan_produk'; //nama tabel
    protected $primaryKey 	= 'id_pp' //primary key
    protected $fillable		= [
    'id_member',
    'id_klinik',
    'nama_produk',
    'waktu',
    'metode_pembayaran',
    'ket_batal'
    ]; //field 

    
}
