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
//            if($request->hasFile('thumbnail')) {
//                $fileName = time().'_'.$request->file->getClientOriginalName();
//                $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');
//
//                $fileModel->name = time().'_'.$request->file->getClientOriginalName();
//                $fileModel->file_path = '/storage/' . $filePath;
//            }
            $thumbnail = 'thumbnail/default.png';
            $docs = '';
            if($request->hasFile('thumbnail'))
            {
                $thumbnail = $this->uploadImage($request->file('thumbnail'), 'thumbnail', 0, 0, false, false);
            }
            if($request->hasFile('docs'))
            {
                $docs = $this->uploadImage($request->file('docs'), 'docs', 0, 0, false, false);
            }

            $book_type = $request->input('book_type_id');
            //$book = Book::create($request->except('book_type_id'));
            $book = Book::create(
                $request->except('book_type_id','thumbnail','docs')
                + [
                    '$thumbnail' => $thumbnail,
                    'docs' => $docs,
                ]);
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
            'description' => 'required',
            'video_link' => 'required_without:docs',
            'docs' => 'required_without:video_link',
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
