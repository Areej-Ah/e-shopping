<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\ServiceFileDatatable;


class ServiceFilesController extends Controller
{
    public function index(ServiceFileDatatable $serviceFile)
    {
        return $serviceFile->render('admin.service_files.index',['title'=>trans('admin.serviceFile')]);
    }



    public function create()
    {
      return view('admin.service_files.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'title_en' => 'required',
            'title_ar' => 'required',
            'text_ar' => 'nullable',
            'text_en' => 'nullable',
            'file'    => 'sometimes|nullable|mimes:doc,pdf,docx',
            'service_id' => 'required',
            'active'  => 'required',

        ],[],[

            'title_en' => trans('admin.title_en'),
            'title_ar' => trans('admin.title_ar'),
            'text_ar' => trans('admin.text_ar'),
            'text_en' => trans('admin.text_en'),
            'file'    => trans('admin.file'),
            'active'   => trans('admin.active'),
            'service_id'   => trans('admin.service_id'),
        ]

        );

        if(request()->hasFile('file'))
		{
			$data['file']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'file',
				'path'        => 'public/serviceFiles',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        ServiceFile::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('service_files'));


    }



    public function show($id)
    {


    }


    public function edit(ServiceFile $serviceFile)
    {
        $title=trans('admin.edit');
        return view('admin.service_files.edit',compact('serviceFile','title'));

    }


    public function update(ServiceFile $serviceFile, Request $request)
    {
        $data = $this->validate(request(),
        [
            'title_en' => 'required',
            'title_ar' => 'required',
            'text_ar' => 'nullable',
            'text_en' => 'nullable',
            'file'    => 'sometimes|nullable|mimes:doc,pdf,docx',
            'service_id' => 'required',
            'active'  => 'required',

        ],[],[

            'title_en' => trans('admin.title_en'),
            'title_ar' => trans('admin.title_ar'),
            'text_ar' => trans('admin.text_ar'),
            'text_en' => trans('admin.text_en'),
            'file'    => trans('admin.file'),
            'active'   => trans('admin.active'),
            'service_id'   => trans('admin.service_id'),
        ]

        );

        if(request()->hasFile('file'))
		{
			$data['file']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'file',
				'path'        => 'public/serviceFiles',
                'upload_type' => 'single',
                'delete_file' => ServiceFile::find($serviceFile->id)->file
			]);
		}

        ServiceFile::where('id',$serviceFile->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('service_files'));

    }



    public function destroy(ServiceFile $serviceFile)
    {
        Storage::delete($serviceFile->file);
        $serviceFile->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('service_files'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $serviceFile=ServiceFile::find($id);
                Storage::delete($serviceFile->file);
                $serviceFile->delete();
             }
        }
        else
        {
            $serviceFile=ServiceFile::find(request('item'));
            Storage::delete($serviceFile->file);
            $serviceFile->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('service_files'));
    }


}
