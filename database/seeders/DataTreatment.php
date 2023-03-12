<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataTreatment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('treatments')->insert([
            'no_kwitansi' => 'KWITANSI_KESATU',
            'description' => 'Perawatan pertama',
            'date' => '2023-03-12',
            'price' => 130000,
            'patient_id' => 1,
            'dentist_id' =>1,
            'type'=>'TAMBAL',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('treatments')->insert([
          'no_kwitansi' => 'KWITANSI_KEDUA',
          'description' => 'Tempor ipsum quis tempor nulla in duis incididunt pariatur aliquip et.Tempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip et',
          'date' => '2023-03-15',
          'price' => 150000,
          'patient_id' => 1,
          'dentist_id' => 1,
          'type' => 'cabut',
          'created_at' => now(),
          'updated_at' => now()
        ]);

    DB::table('treatments')->insert([
      'no_kwitansi' => 'KWITANSI_KETIGA',
      'description' => 'Perawatan pertama',
      'date' => '2023-03-12',
      'price' => 130000,
      'patient_id' => 1,
      'dentist_id' => 1,
      'type' => 'TAMBAL',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('treatments')->insert([
      'no_kwitansi' => 'KWITANSI_KEEMPAT',
      'description' => 'Perawatan pertama',
      'date' => '2023-03-12',
      'price' => 130000,
      'patient_id' => 1,
      'dentist_id' => 1,
      'type' => 'TAMBAL',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('treatments')->insert([
      'no_kwitansi' => 'KWITANSI_KEEMPATs',
      'description' => 'Perawatan pertama',
      'date' => '2023-03-12',
      'price' => 130000,
      'patient_id' => 1,
      'dentist_id' => 1,
      'type' => 'TAMBAL',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('treatments')->insert([
      'no_kwitansi' => 'KWITANSI_KELIMA',
      'description' => 'Perawatan pertama',
      'date' => '2023-03-12',
      'price' => 130000,
      'patient_id' => 1,
      'dentist_id' => 1,
      'type' => 'TAMBAL',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    }
}
