<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusKlinik extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('statuskliniks')->insert([
      'id' => 1,
      'status' => 'open',
      'created_at' => now(),
      'updated_at' => now()
    ]);
  }
}
