<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataDentist extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dentists')->insert([
            'id' => 1,
            'name' => 'Dokter Testing',
            'email' => 'dokter@gmail.com',
            'gender' => 'wanita',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone' => '081212345678',
            'specialty' => 'Gigi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
