<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Config;

class Service
{
    public function __construct()
    {
    }

	public function run($_qry)
	{
		$db_config = Config::get('database.connections.'.Config::get('database.default'));
		$mysqli = mysqli_connect($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);

	  	$result1 = mysqli_query($mysqli, "$_qry");
		return $result1;
	}

    public function uploadImage($file, $folder, $maxWith, $maxHeight, $thumb=true, $crop = true){
        $path = $file->store($folder, 'public');
        if($thumb){
           $this->generateThumbnail($file, $path, $folder, $maxWith, $maxHeight, $crop);
        }
        return $path;
    }

    public function generateThumbnail($file, $path, $folder, $maxWith, $maxHeight, $crop){
        try {
            /*get full uploaded file name*/
            $uploaded_file = $file->hashName();
            $file_extension = $file->extension();
            /*file name without extension*/
            $file_name = pathinfo($uploaded_file, PATHINFO_FILENAME);

            $thumb = storage_path('app/public/'.$folder.'/'.$file_name.'_thumb.'.$file_extension);
            /*resize image*/
            return resizeImage( storage_path('app/public/'.$path), $thumb, $maxWith, $maxHeight, $crop);
        } catch (\Exception $e) {
            report($e);
            return false;
        }

    }

    public function removeImage($file){
        try {
            Storage::disk('public')->delete($file);
            return ture;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function format_errors($errors)
    {
        $arx = array();
        foreach($errors->all() as $e)
        {
            $arx[] = ($e);
        }

        //return array('validation_error' => array(implode("<br/>", $arx)));
        return (object) $arx;

    }
}
