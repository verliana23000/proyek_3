<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
{
    protected $table		= 'admin'; //nama tabel
    protected $primaryKey 	= 'id_admin'; //primary key
    protected $fillable		= [
    'nama',
    'jk',
    'alamat',
    'email',
    'password',		
    ]; //field 
    
}
