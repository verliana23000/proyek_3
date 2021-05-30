<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class KlinikModel extends Authenticatable
{
    protected $table		= 'klinik'; //nama tabel
    protected $primaryKey 	= 'id_klinik'; //primary key
    protected $fillable		= [
    'nama_klinik',
    'alamat',
    'no_hp',
    'email',
    'password',
    'deskripsi',
    'logo'
    ]; //field 

    public function member(){
        return $this->hasMany(MemberModel::class,'id_member');
    }

    public function produk(){
        return $this->hasMany(ProdukModel::class,'id_produk');
    }

    public function treatment(){
        return $this->hasMany(TreatmentModel::class,'id_treatment');
    }
}
