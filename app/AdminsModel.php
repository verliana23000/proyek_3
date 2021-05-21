<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminsModel extends Model
{
    protected $table		= 'admins'; //nama tabel
    protected $primaryKey 	= 'id_admin'; //primary key
    protected $fillable		= [
    	'nama',
    	'jk',
    	'alamat', 
    	'email',
    	'password',
    ]; //field 
    
}
