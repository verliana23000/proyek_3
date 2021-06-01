<?php

use Illuminate\Database\Seeder;
use App\AdminModel;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminModel::create([
        'nama'      =>'verli',
    	'jk'        =>'Perempuan',
    	'alamat'    =>'Balongan', 
    	'email'     =>'verli@gmail.com',
    	'password'  =>bcrypt('12345678'),
        ]);
    }
}
