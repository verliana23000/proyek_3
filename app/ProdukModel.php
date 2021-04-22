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

    public function Klinik(){
        return $this->hasMany(ProdukModel::class,'id_produk');
    }
}
