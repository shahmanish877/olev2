<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\ClassLevel;

class ClassLevelService extends Service
{
    public function __construct()
    {
    }

    public function getAll()
    {
        $request = request();
        $academic_query = $request->query('academic');

        $primary = ['1', '2', '3', '4', '5'];
        $secondary = ['6', '7', '8', '9', '10', '11', '12'];

        $query = new ClassLevel();
        if($academic_query && $academic_query == 1){
            $query = $query::where('name', $primary);
        }else if($academic_query && $academic_query == 2){
            $query = $query::where('name', $secondary);
        }else if($academic_query && $academic_query >= 3){
            $query = $query::whereNotBetween('name', ['1','12']);
        }

        $all = $query->get();
        return $all;

    }

    public function single($id)
    {
        $class_level = ClassLevel::where('id', $id)->first();
        if(is_null($class_level))
        {
            return ['error' => 'Record Not Found'];
        }
        return $class_level;
    }

    public function store(Request $request)
    {
        try
        {
            $class_level = ClassLevel::create($request->all());
            return ['success' => '1', 'class_level' => $class_level];
        }
        catch(Exception $e)
        {
            return ['error' => 'Error Inserting Record'];
        }
    }

    public function update(Request $request, $id)
    {
        $class_level = $this->single($id);
        if(isset($class_level['error']))
        {
            return ['error' => $class_level['error']];
        }

        try
        {
            $class_level->update($request->all());
            return ['success' => '1', 'class_level' => $class_level];
        }
        catch(Exception $e)
        {
            return ['error' => 'Error Inserting Record'];
        }

    }

    public function delete($id)
    {
        $class_level = $this->single($id);
        if(isset($class_level['error']))
        {
            return ['error' => $class_level['error']];
        }

        try
        {
            $class_level->delete();
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
            'name' => 'required|unique:class_levels',
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
