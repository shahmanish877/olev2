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
            'academic_id' => 1,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '2',
            'academic_id' => 1,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '3',
            'academic_id' => 1,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '4',
            'academic_id' => 1,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '5',
            'academic_id' => 1,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '6',
            'academic_id' => 2,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '7',
            'academic_id' => 2,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '8',
            'academic_id' => 2,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '9',
            'academic_id' => 2,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '10',
            'academic_id' => 2,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '11',
            'academic_id' => 2,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '12',
            'academic_id' => 2,
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
        DB::table('class_levels')->insert([
            'name' => '3rd semester',
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '4th semester',
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
        DB::table('class_levels')->insert([
            'name' => '5th semester',
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
    }
}
