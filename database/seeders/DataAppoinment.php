<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataAppoinment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([
            'id' => 1,
            'patient_id' =>1 ,
            'status' => 'confirm',
            'date' => '2023-03-12',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
