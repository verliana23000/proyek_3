<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemesananProdukModel extends Model
{
  	protected $table		= 'pemesanan_produk'; //nama tabel
    protected $primaryKey 	= 'id_pp'; //primary key
    protected $fillable		= [
    'id_member',
    'status',
    'metode_pembayaran',
    'ket_batal'
    ]; //field 
    
    public function detailpp(){
      return $this->hasMany(DetailPemesananProdukModel::class,'id_pp');
  }
    public function klinik(){
      return $this->belongsTo(KlinikModel::class,'id_klinik');
  }

  public function member(){
    return $this->belongsTo(MemberModel::class,'id_member');
}
    
}
