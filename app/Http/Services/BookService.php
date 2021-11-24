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
        $all = Book::all();
        return $all;
    }

    public function single($id)
    {
        $book = Book::where('id', $id)->first();
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
            $book = Book::create($request->all());
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
            $book->update($request->all());
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
            return array('code' => '0', 'message' => 'Operation Failed', 'errors' => $this->format_errors($validator->errors()));
        }
        else
        {
            return true;
        }
    }

}