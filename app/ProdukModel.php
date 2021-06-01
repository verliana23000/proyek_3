<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    protected $table		= 'produk'; //nama tabel
    protected $primaryKey 	= 'id_produk'; //primary key
    protected $fillable		= [
    'nama_produk',
    'jenis_produk',
    'harga_produk',
    'stok',
    'gambar',
    'id_klinik',
    
    ]; //field 

    public function klinik(){
        return $this->belongsTo(KlinikModel::class, 'id_klinik');
    }
}
