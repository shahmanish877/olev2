<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Book;
use JD\Cloudder\Facades\Cloudder;

class BookService extends Service
{
    public function __construct()
    {

    }

    public function getAll(Request $request)
    {
        $academic_query = $request->query('academic');
        $class_query = $request->query('class');
//        if($academic_query){
//            //dd($academic_query);
//            $all = Book::info()->where('academic_id','=',$academic_query)->get();
//        }else if($class_query){
//            //dd($academic_query);
//            $all = Book::info()->where('class_id','=',$class_query)->get();
//        }

        $query = Book::info();
        if($academic_query){
            $query->where('academic_id','=',$academic_query);
        }
        if($class_query){
            $query->where('class_level_id','=',$class_query);
        }
        $all = $query->get();
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
            $docs = '';
            $thumbnail = 'thumbnail/default.png';

            if($request->hasFile('thumbnail'))
            {
                //$thumbnail = $this->uploadImage($request->file('thumbnail'), 'thumbnail', 0, 0, false, false);
                $image_name = $request->file('thumbnail')->getRealPath();;
                $cloudinary = Cloudder::upload($image_name, null, array("folder" => "olev2", "overwrite" => TRUE, "resource_type" => "image"));
                $thumbnail = Cloudder::getPublicId();
                dd($cloudinary);
            }
//            if($request->hasFile('docs'))
//            {
//                $docs = $this->uploadImage($request->file('docs'), 'docs', 0, 0, false, false);
//            }


            //dd($thumbnail);
            //dd($docs);
            $book_type = $request->input('book_type_id');
            //$book = Book::create($request->except('book_type_id'));
            $book = Book::create(
                $request->except('book_type_id','thumbnail','docs')
                + [
                    'thumbnail' => $thumbnail,
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
