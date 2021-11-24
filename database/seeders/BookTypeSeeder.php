<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
