<?php

use Illuminate\Database\Seeder;
use App\AdminsModel;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminsModel::create([
        'nama'      =>'iis',
    	'jk'        =>'Perempuan',
    	'alamat'    =>'Plumbon', 
    	'email'     =>'iisimut@gmail.com',
    	'password'  =>Hash::make('iis123'),
        ]);
    }
}
