<?php

namespace App\Http\Controllers;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;

class UploadController extends Controller
{
    public function delete($id)
    {
        $file= File::find($id);
        if(!empty($file))
        {
            Storage::delete($file->path);
            $file->delete();
        }


    }
    public function delete_files($product_id)
    {
        $files = File::where('file_type','product')->where('relation_id',$product_id)->get();
        if(count($files) > 0){
            foreach($files as $file){
                $this->delete($file->id);
                Storage::deleteDirectory($file->path);
            }

        }



    }
    public  function upload ($data = [])
    {
        if(in_array('new_name',$data))
        {
          $new_name = $data['new_name'] === null ? time() : $new_name;
        }

        if ( (request()->hasFile($data['file'])) && ($data['upload_type'] == 'single'))
        {
            //!is_null($data['delete_file']) &&
            Storage::has($data['delete_file'] )?Storage::delete($data['delete_file']):'';
          return request()->file($data['file'])->store($data['path']);
        }
        elseif((request()->hasFile($data['file'])) && ($data['upload_type'] == 'files')){
            $file = request()->file($data['file']);
            $size = $file->getSize();
            $mime_type = $file->getMimeType();
            $name= $file->getClientOriginalName();
            $hashname= $file->hashName();

            $file->store($data['path']);
            $add = File::create([
                'name' => $name,
                'size' => $size,
                'file' => $hashname,
                'path' => $data['path'].'/' .$hashname,
                'mime_type' => $mime_type,
                'file_type'=> $data['file_type'],
                'relation_id' => $data['relation_id'],
            ]);
            return $add->id;
        }

    }
}
