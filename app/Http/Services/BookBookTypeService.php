<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\BookBookType;

class BookBookTypeService extends Service
{
    public function __construct()
    {
    }

    public function getAll()
    {
        $all = BookBookType::all();
        return $all;
    }

    public function single($id)
    {
        $book_book_type = BookBookType::where('id', $id)->first();
        if(is_null($book_book_type))
        {
            return ['error' => 'Record Not Found'];
        }
        return $book_book_type;
    }

    public function store(Request $request)
    {
        try
        {
            $book_book_type = BookBookType::create($request->all());
            return ['success' => '1', 'book_book_type' => $book_book_type];
        }
        catch(Exception $e)
        {
            return ['error' => 'Error Inserting Record'];
        }
    }

    public function update(Request $request, $id)
    {
        $book_book_type = $this->single($id);
        if(isset($book_book_type['error']))
        {
            return ['error' => $book_book_type['error']];
        }

        try
        {
            $book_book_type->update($request->all());
            return ['success' => '1', 'book_book_type' => $book_book_type];
        }
        catch(Exception $e)
        {
            return ['error' => 'Error Inserting Record'];
        }

    }

    public function delete($id)
    {
        $book_book_type = $this->single($id);
        if(isset($book_book_type['error']))
        {
            return ['error' => $book_book_type['error']];
        }

        try
        {
            $book_book_type->delete();
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
            'book_type_id' => 'required',
            'book_id' => 'required',
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
