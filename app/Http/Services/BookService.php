<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Book;

class BookService extends Service
{
    public function __construct()
    {

    }

    public function getAll()
    {
        $all = Book::info()->get();
        return $all;
    }

    public function single($id)
    {
        $book = Book::info()->find($id);
        if(is_null($book))
        {
            return ['error' => 'Record Not Found'];
        }
        return $book;
    }

    public function store(Request $request)
    {
        try
        {
            $book_type = $request->input('book_type_id');
//            foreach ($book_type as $bt){
//                echo $bt;
//            }
//            dd($bt);
            $book = Book::create($request->except('book_type_id'));
            $book->book_types()->attach($book_type);
            return ['success' => '1', 'book' => $book];
        }
        catch(Exception $e)
        {
            return ['error' => 'Error Inserting Record'];
        }
    }

    public function update(Request $request, $id)
    {
        $book = $this->single($id);

        if(isset($book['error']))
        {
            return ['error' => $book['error']];
        }

        try
        {
            $book_type = $request->input('book_type_id');
            $book->update($request->except('book_type_id'));
            $book->book_types()->sync($book_type);
            return ['success' => '1', 'book' => $book];
        }
        catch(Exception $e)
        {
            return ['error' => 'Error Inserting Record'];
        }

    }

    public function delete($id)
    {
        $book = $this->single($id);
        if(isset($book['error']))
        {
            return ['error' => $book['error']];
        }

        try
        {
            $book->delete();
            return ['success' => '1'];
        }
        catch(Exception $e)
        {
            return ['error' => 'Error Deleting Record'];
        }
    }

    function validate(Request $request)
    {
        $input = $request->all();
        $validator = \Validator::make($input, [
            'name' => 'required',
            'author' => 'required',
            'publication' => 'required',
            'published_date' => 'required|date',
            'class_level_id' => 'required',
            'book_type_id' => 'required',
            'academic_id' => 'required',
        ]);

        if($validator->fails())
        {
            $response = array('response' => '', 'success'=>false);
            return array('code' => '0', 'message' => 'Operation Failed', 'errors' => $this->format_errors($validator->errors()));
        }
        else
        {
            return true;
        }
    }
}
