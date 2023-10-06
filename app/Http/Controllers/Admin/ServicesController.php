<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\ServiceDatatable;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceDatatable $service)
    {
        return $service->render('admin.services.index',['title'=>trans('admin.services')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create',['title'=>trans('admin.create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_ar' =>'required',
            'description_en' =>'required',
            'icon'           => 'sometimes|nullable|'.validate_image(),
            'image'  => 'sometimes|nullable|'.validate_image(),
            'active'  => 'required',

        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'description_ar' => trans('admin.description_ar'),
            'description_en' => trans('admin.description_en'),
            'icon'    => trans('admin.icon'),
            'image'    => trans('admin.image'),
            'active'    => trans('admin.active'),
        ]

        );

        if(request()->hasFile('icon'))
		{
			$data['icon']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'icon',
				'path'        => 'public/services',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        if(request()->hasFile('image'))
		{
			$data['image']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'image',
				'path'        => 'public/services',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Service::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('services'));


    }



    public function show($id)
    {


    }


    public function edit(Service $service)
    {
        $title=trans('admin.edit');
        return view('admin.services.edit',compact('service','title'));

    }


    public function update(Service $service, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_ar' =>'required',
            'description_en' =>'required',
            'icon'    => 'sometimes|nullable|'.validate_image(),
            'image'    => 'sometimes|nullable|'.validate_image(),
            'active' => 'required',

        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'description_ar' => trans('admin.description_ar'),
            'description_en' => trans('admin.description_en'),
            'icon'    => trans('admin.icon'),
            'image'    => trans('admin.image'),
            'active'    => trans('admin.active'),
        ]

        );

        if(request()->hasFile('icon'))
		{
			$data['icon']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'icon',
				'path'        => 'public/services',
                'upload_type' => 'single',
                'delete_file' => Service::find($service->id)->icon
			]);
		}

        if(request()->hasFile('image'))
		{
			$data['image']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'image',
				'path'        => 'services',
                'upload_type' => 'single',
                'delete_file' => Service::find($service->id)->image
			]);
		}

        Service::where('id',$service->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('services'));

    }



    public function destroy(Service $service)
    {
        Storage::delete($service->icon);
        Storage::delete($service->image);
        $service->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('services'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $service=Service::find($id);
                Storage::delete($service->icon);
                Storage::delete($service->image);
                $service->delete();
             }
        }
        else
        {
            $service=Service::find(request('item'));
            Storage::delete($service->icon);
            Storage::delete($service->image);
            $service->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('services'));
    }
}
