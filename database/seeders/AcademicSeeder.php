<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academics')->insert([
            'name' => 'Primary',
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('academics')->insert([
            'name' => 'Secondary',
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('academics')->insert([
            'name' => 'Bsc. CSIT',
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('academics')->insert([
            'name' => 'BBA',
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
    }
}
