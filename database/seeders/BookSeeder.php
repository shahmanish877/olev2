<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => 'Science',
            'author' => 'Albert',
            'isbn' => '5646-313-564-16564',
            'publication' => 'Dharan Publication',
            'published_date' => '2021-11-02',
            'class_level_id' => 1,
            'academic_id' => 1,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);

        DB::table('books')->insert([
            'name' => 'Math',
            'author' => 'Albert',
            'isbn' => '235-313-564-16564',
            'publication' => 'Kathamandu Publication',
            'published_date' => '2015-11-02',
            'class_level_id' => 2,
            'academic_id' => 2,
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
    }
}
