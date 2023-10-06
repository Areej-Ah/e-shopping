<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Factory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\FactoryDatatable;

class FactoriesController extends Controller
{

    public function index(FactoryDatatable $factory)
    {
        return $factory->render('admin.factories.index',['title'=>trans('admin.factories')]);
    }



    public function create()
    {
      return view('admin.factories.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'name_en'    => 'required',
            'name_ar'    => 'required',
            'logo'       => 'required|'.validate_image(),
            'facebook'   => 'sometimes|nullable|url',
            'website'    => 'sometimes|nullable|url',
            'twitter'    => 'sometimes|nullable|url',
            'address_en' => 'sometimes|nullable',
            'address_ar' => 'sometimes|nullable',
            'email'      => 'sometimes|nullable|email',
            'mobile'     => 'sometimes|nullable|numeric',
            'active'     => 'required',
            'lat'        => 'sometimes|nullable',
            'lng'        => 'sometimes|nullable',


        ],[],[

            'name_en'    => trans('admin.name_en'),
            'name_ar'    => trans('admin.name_ar'),
            'facebook'   => trans('admin.facebook'),
            'website'    => trans('admin.website'),
            'twitter'    => trans('admin.twitter'),
            'address_en' => trans('admin.address_en'),
            'address_ar' => trans('admin.address_ar'),
            'active'     => trans('admin.activation'),
            'mobile'     => trans('admin.mobile'),
            'email'      => trans('admin.email'),
            'lat'        => trans('admin.lat'),
            'lng'        => trans('admin.lng'),

        ]

        );

        if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/factories',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Factory::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('factories'));


    }



    public function show($id)
    {


    }


    public function edit(Factory $factory)
    {
        $title=trans('admin.edit');
        return view('admin.factories.edit',compact('factory','title'));

    }


    public function update(Factory $factory, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name_en'    => 'required',
            'name_ar'    => 'required',
            'logo'       => 'sometimes|nullable|'.validate_image(),
            'facebook'   => 'sometimes|nullable|url',
            'website'    => 'sometimes|nullable|url',
            'twitter'    => 'sometimes|nullable|url',
            'address_en' => 'sometimes|nullable',
            'address_ar' => 'sometimes|nullable',
            'email'      => 'sometimes|nullable|email',
            'mobile'     => 'sometimes|nullable|numeric',
            'active'     => 'required',
            'lat'        => 'sometimes|nullable',
            'lng'        => 'sometimes|nullable',


        ],[],[

            'name_en'    => trans('admin.name_en'),
            'name_ar'    => trans('admin.name_ar'),
            'facebook'   => trans('admin.facebook'),
            'website'    => trans('admin.website'),
            'twitter'    => trans('admin.twitter'),
            'address_en' => trans('admin.address_en'),
            'address_ar' => trans('admin.address_ar'),
            'active'     => trans('admin.activation'),
            'mobile'     => trans('admin.mobile'),
            'email'      => trans('admin.email'),
            'lat'        => trans('admin.lat'),
            'lng'        => trans('admin.lng'),

        ]

        );

        if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/factories',
                'upload_type' => 'single',
                'delete_file' => Factory::find($factory->id)->logo
			]);
		}

        Factory::where('id',$factory->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('factories'));

    }



    public function destroy(Factory $factory)
    {
        Storage::delete($factory->logo);
        $factory->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('factories'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $factory=Factory::find($id);
                Storage::delete($factory->logo);
                $factory->delete();
             }
        }
        else
        {
            $factory=Factory::find(request('item'));
            Storage::delete($factory->logo);
            $factory->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('factories'));
    }




}
