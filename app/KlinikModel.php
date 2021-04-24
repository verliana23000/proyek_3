<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KlinikModel extends Model
{
    protected $table		= 'klinik'; //nama tabel
    protected $primaryKey 	= 'id_klinik'; //primary key
    protected $fillable		= [
    'nama_klinik',
    'alamat',
    'no_hp',
    'deskripsi',
    'logo'
    ]; //field 

    public function produk(){
        return $this->hasMany(ProdukModel::class,'id_produk');
    }
}
