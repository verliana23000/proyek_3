<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentModel extends Model
{
    protected $table		= 'treatment'; //nama tabel
    protected $primaryKey 	= 'id_treatment'; //primary key
    protected $fillable		= [
    'nama_treatment',
    'jenis_treatment',
    'harga_treatment',
    'gambar',
    'id_klinik',

    ]; //field

    public function klinik(){
        return $this->belongsTo(KlinikModel::class,'id_klinik');
    }
}
