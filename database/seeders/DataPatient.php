<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPatient extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'id' => 1,
            'name' => 'Pasien Testing',
            'email' => 'pasien@gmail.com',
            'gender' => 'laki-laki',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone_no' => '081212345678',
            'birthdate' => '2000-01-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
