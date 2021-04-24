<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntrianModel extends Model
{
	protected $table		= 'antrian'; //nama tabel
    protected $primaryKey 	= 'id_antrian'; //primary key
    protected $fillable		= [
	    'id_member',
	    'jenis_antrian',
	    'nama_member',
	    'no_telp',
	    'no_antrian',
	    'waktu'
	    ]; //field

	public function Treatment(){
    	return $this->belongsTo(TreatmentModel::class,'id_pt');
        
    }  

    public function Member(){
    	return $this->belongsTo(MemberModel::class,'id_member');
        
    }

	public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y H:i');
    }
}
