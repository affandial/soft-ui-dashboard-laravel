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
      'id' => 1,
      'assessment' => 'Perawatan pertama',
      'date' => date("Y-m-d", strtotime("-3 day")),
      'patient_id' => 2,
      'dentist_id' => 3,
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('treatments')->insert([
      'id' => 2,
      'assessment' => 'Tempor ipsum quis tempor nulla in duis incididunt pariatur aliquip et.Tempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip etTempor ipsum quis tempor nulla in duis incididunt pariatur aliquip et',
      'date' => date("Y-m-d", strtotime("-2 day")),
      'patient_id' => 4,
      'dentist_id' => 2,
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('treatments')->insert([
      'id' => 3,
      'assessment' => 'Perawatan pertama',
      'date' => date("Y-m-d", strtotime("-1 day")),
      'patient_id' => 5,
      'dentist_id' => 1,
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('treatments')->insert([
      'id' => 4,
      'assessment' => 'Perawatan pertama',
      'date' => date("Y-m-d", strtotime("-1 day")),
      'patient_id' => 6,
      'dentist_id' => 1,
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('treatments')->insert([
      'id' => 5,
      'assessment' => 'Perawatan pertama',
      'date' => date("Y-m-d"),
      'patient_id' => 2,
      'dentist_id' => 2,
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('treatments')->insert([
      'id' => 6,
      'assessment' => 'Perawatan pertama',
      'date' => date("Y-m-d"),
      'patient_id' => 7,
      'dentist_id' => 3,
      'created_at' => now(),
      'updated_at' => now()
    ]);
  }
}
