<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Academic;
use Illuminate\Support\Str;

class AcademicService extends Service
{
    public function __construct()
    {
    }

    public function getAll()
    {
        $all = Academic::all();
        return $all;
    }

    public function single($id)
    {
        $academic = Academic::where('id', $id)->first();
        if(is_null($academic))
        {
            return ['error' => 'Record Not Found'];
        }
        return $academic;
    }

    public function store(Request $request)
    {
        try
        {
            $academic = Academic::create($request->all());
            return ['success' => '1', 'academic' => $academic];
        }
        catch(Exception $e)
        {
            return ['error' => 'Error Inserting Record'];
        }
    }

    public function update(Request $request, $id)
    {
        $academic = $this->single($id);
        if(isset($academic['error']))
        {
            return ['error' => $academic['error']];
        }

        try
        {
            $academic->update($request->all());
            return ['success' => '1', 'academic' => $academic];
        }
        catch(Exception $e)
        {
            return ['error' => 'Error Inserting Record'];
        }

    }

    public function delete($id)
    {
        $academic = $this->single($id);
        if(isset($academic['error']))
        {
            return ['error' => $academic['error']];
        }

        try
        {
            $academic->delete();
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
        $request->name = Str::lower($request->name);

        $validator = \Validator::make($input, [
            'name' => 'required|unique:academics',
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
