<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentModel extends Model
{
    protected $table		= 'treatment'; //nama tabel
    protected $primaryKey 	= 'id_treatment' //primary key
    protected $fillable		= [
    'id_klinik',
    'nama_treatment',
    'jenis_treatment',
    'harga_treatment',
    'gambar'
    ]; //field

    public function PemesananTreatment(){
        return $this->belongsToMany(PemesananProdukModel::class,'detail_pemesanan_treatment', 'id_pt', 'id_treatment');
}
