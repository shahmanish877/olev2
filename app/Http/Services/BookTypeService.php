<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\BookType;

class BookTypeService extends Service
{
	public function __construct()
	{
	}

	public function getAll()
	{
        $all = BookType::all();
		return $all;
	}

	public function single($id)
	{
		$book_type = BookType::where('id', $id)->first();
		if(is_null($book_type))
		{
			return ['error' => 'Record Not Found'];
		}
		return $book_type;
	}

	public function store(Request $request)
	{
		try
		{
            $book_type = BookType::create($request->all());
			return ['success' => '1', 'book_type' => $book_type];
		}
		catch(Exception $e)
		{
			return ['error' => 'Error Inserting Record'];
		}
	}

	public function update(Request $request, $id)
	{
		$book_type = $this->single($id);
		if(isset($book_type['error']))
		{
			return ['error' => $book_type['error']];
		}

		try
		{
        	$book_type->update($request->all());
			return ['success' => '1', 'book_type' => $book_type];
		}
		catch(Exception $e)
		{
			return ['error' => 'Error Inserting Record'];
		}

	}

	public function delete($id)
	{
		$book_type = $this->single($id);
		if(isset($book_type['error']))
		{
			return ['error' => $book_type['error']];
		}

		try
		{
	     	$book_type->delete();
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
            'name' => 'required|unique:book_types',
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
