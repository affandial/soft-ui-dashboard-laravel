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
            'name' => 'Testing',
            'email' => 'testing@gmail.com',
            'gender' => 'pria',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone_no' => '081212345678',
            'birthdate' => '2002-02-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('patients')->insert([
            'id' => 2,
            'name' => 'Anton',
            'email' => 'anton@gmail.com',
            'gender' => 'pria',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone_no' => '081212345679',
            'birthdate' => '1990-10-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('patients')->insert([
            'id' => 3,
            'name' => 'Budi',
            'email' => 'budi@gmail.com',
            'gender' => 'pria',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone_no' => '081212345618',
            'birthdate' => '1997-01-05',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('patients')->insert([
            'id' => 4,
            'name' => 'Jaka',
            'email' => 'jaka@gmail.com',
            'gender' => 'pria',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone_no' => '081212341678',
            'birthdate' => '2003-01-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('patients')->insert([
            'id' => 5,
            'name' => 'Sero',
            'email' => 'sri@gmail.com',
            'gender' => 'wanita',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone_no' => '0812123345678',
            'birthdate' => '1998-03-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('patients')->insert([
            'id' => 6,
            'name' => 'Muya',
            'email' => 'muya@gmail.com',
            'gender' => 'wanita',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone_no' => '081215645678',
            'birthdate' => '2000-01-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('patients')->insert([
            'id' => 7,
            'name' => 'dadder',
            'email' => 'dader@gmail.com',
            'gender' => 'laki-laki',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone_no' => '081215345678',
            'birthdate' => '1993-01-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('patients')->insert([
            'id' => 9,
            'name' => 'Pranomo',
            'email' => 'pranomo@gmail.com',
            'gender' => 'laki-laki',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone_no' => '081269345678',
            'birthdate' => '2003-12-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('patients')->insert([
            'id' => 10,
            'name' => 'Patek',
            'email' => 'pate@gmail.com',
            'gender' => 'laki-laki',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone_no' => '081212695678',
            'birthdate' => '1999-01-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('patients')->insert([
            'id' => 11,
            'name' =>'Ayu',
            'email' => 'ayu@gmail.com',
            'gender' => 'wanita',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone_no' => '0812198645678',
            'birthdate' => '2001-01-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('patients')->insert([
            'id' => 12,
            'name' => 'Abui',
            'email' => 'abui@gmail.com',
            'gender' => 'laki-laki',
            'address' => 'Klinik Gigi Dokter Jayanti Cikupa',
            'phone_no' => '081212344628',
            'birthdate' => '2000-01-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
