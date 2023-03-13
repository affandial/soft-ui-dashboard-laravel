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
      'patient_id' => 1,
      'status' => 'pending',
      'date' => '2023-03-12',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('appointments')->insert([
      'id' => 2,
      'patient_id' => 3,
      'status' => 'pending',
      'date' => '2023-03-11',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('appointments')->insert([
      'id' => 3,
      'patient_id' => 1,
      'status' => 'cancel',
      'date' => '2023-03-11',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('appointments')->insert([
      'id' => 4,
      'patient_id' => 1,
      'status' => 'confirm',
      'date' => '2023-03-09',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('appointments')->insert([
      'id' => 5,
      'patient_id' => 1,
      'status' => 'pending',
      'date' => '2023-03-13',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('appointments')->insert([
      'id' => 6,
      'patient_id' => 2,
      'status' => 'confirm',
      'date' => '2023-03-13',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('appointments')->insert([
      'id' => 7,
      'patient_id' => 3,
      'status' => 'cancel',
      'date' => '2023-03-13',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('appointments')->insert([
      'id' => 8,
      'patient_id' => 5,
      'status' => 'pending',
      'date' => '2023-03-14',
      'created_at' => now(),
      'updated_at' => now()
    ]);
    DB::table('appointments')->insert([
      'id' => 9,
      'patient_id' => 3,
      'status' => 'pending',
      'date' => '2023-03-15',
      'created_at' => now(),
      'updated_at' => now()
    ]);

  }
}
