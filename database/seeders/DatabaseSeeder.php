<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
// \App\Models\User::factory(10)->create();
        DB::table('book_types')->insert([
            'name' => 'video',
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);

        DB::table('book_types')->insert([
            'name' => 'document',
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);

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

        DB::table('books')->insert([
            'name' => 'Science',
            'author' => 'Albert',
            'isbn' => '5646-313-564-16564',
            'publication' => 'Dharan Publication',
            'published_date' => '2021-11-02',
            'class_level_id' => 1,
            'book_type_id' => 1,
            'academic_id' => 1,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
    }
}
