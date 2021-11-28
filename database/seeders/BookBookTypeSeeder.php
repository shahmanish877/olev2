<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookBookType;
use App\Models\BookType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookBookTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book::paginate(2);
        $book_types = BookType::paginate(2);

        foreach ($books as $book) {
            foreach ($book_types as $book_type) {
                DB::table('book_book_type')->insert([
                    'book_id' => $book->id,
                    'book_type_id' => $book_type->id,
                ]);
            }
        }
    }
}
