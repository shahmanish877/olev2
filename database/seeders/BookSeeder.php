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
            'thumbnail' => 'https://res.cloudinary.com/dl6qtnmbx/image/upload/v1639053241/olev2/default_xoqrkd.png',
            'academic_id' => 1,
            'video_link' => '#',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a galley of type and scrambled it to make a type specimen book. It has survived not
                            only five centuries, but also the leap into electronic typesetting, remaining essentially
                             unchanged.",
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
            'thumbnail' => 'thumbnail/default.png',
            'video_link' => '#',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a galley of type and scrambled it to make a type specimen book. It has survived not
                            only five centuries, but also the leap into electronic typesetting, remaining essentially
                             unchanged.",
            'created_at' =>NOW(),
            'updated_at' =>NOW(),
        ]);
    }
}
