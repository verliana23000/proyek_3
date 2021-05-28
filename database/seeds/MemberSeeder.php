<?php

use Illuminate\Database\Seeder;
use App\MemberModel;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MemberModel::create([
            'nama_member'=> 'vira',
            'ttl' => '1998-02-03',
            'jk' => 'Perempuan',
            'no_hp' => '089661143256',
            'email' => 'viraimut@gmail.com',
            'password' => bcrypt('vira123') ,
            'id_klinik' => 1,
        ]);
    }
}
