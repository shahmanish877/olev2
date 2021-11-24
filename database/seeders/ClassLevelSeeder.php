<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_levels')->insert([
            'name' => '1',
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '1st semester',
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '2nd semester',
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
    }
}
