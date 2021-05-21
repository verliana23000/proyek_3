<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPemesananTreatmentModel extends Model
{
    protected $table		= 'detail_pemesanan_treatment'; //nama tabel
    protected $primaryKey 	= 'id_detail_pt'; //primary key
    protected $fillable		= [
    	'id_pt',
    	'id_treatment',
    	'jumlah',
    	'total'
    	]; //field 

    public function Treatment(){
    	return $this->belongsTo(TreatmentModel::class, 'id_treatment');
    }

    public function PemesananTreatment(){
    	return $this->belongsTo(PemesananTreatmentModel::class,'id_pt');
        
    }
}
