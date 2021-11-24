<?php

namespace Database\Seeders;

use App\Http\Controllers\BookBookTypeController;
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
        $this->call([
            AcademicSeeder::class,
            BookTypeSeeder::class,
            ClassLevelSeeder::class,
            BookSeeder::class,
            BookBookTypeSeeder::class,
        ]);

    }
}
