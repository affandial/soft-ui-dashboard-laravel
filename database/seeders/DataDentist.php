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
      'name' => 'Affandi Agung L',
      'email' => 'affandi@agung.com',
      'gender' => 'Pria',
      'address' => 'Sawangan',
      'phone' => '081311112222',
      'specialty' => 'bedah',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('dentists')->insert([
      'id' => 2,
      'name' => 'Erni',
      'email' => 'erni@gmail.com',
      'gender' => 'wanita',
      'address' => 'Cikande',
      'phone' => '081788889999',
      'specialty' => 'Cabut',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    DB::table('dentists')->insert([
      'id' => 3,
      'name' => 'Muchlas',
      'email' => 'muchlas@gmail.com',
      'gender' => 'pria',
      'address' => 'Depok',
      'phone' => '085644445889',
      'specialty' => 'Tambal',
      'created_at' => now(),
      'updated_at' => now()
    ]);
  }
}
