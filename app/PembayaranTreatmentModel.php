<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranTreatmentModel extends Model
{
    protected $table		= 'pembayaran_treatment'; //nama tabel
    protected $primaryKey 	= 'id_pembayaran_treatment'; //primary key
    protected $fillable		= [
    'id_pt',
    'bukti_tf',
    'status'
    ]; //field 

    public function PemesananTreatment(){
    	return $this->belongsTo(PemesananTreatmentModel::class,'id_pt');
        
    }
}
