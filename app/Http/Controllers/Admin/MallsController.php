<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mall;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\MallDatatable;

class MallsController extends Controller
{

    public function index(MallDatatable $mall)
    {
        return $mall->render('admin.malls.index',['title'=>trans('admin.malls')]);
    }



    public function create()
    {
      return view('admin.malls.create',['title'=>trans('admin.create')]);
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
				'path'        => 'public/malls',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Mall::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('malls'));


    }



    public function show($id)
    {


    }


    public function edit(Mall $mall)
    {
        $title=trans('admin.edit');
        return view('admin.malls.edit',compact('mall','title'));

    }


    public function update(Mall $mall, Request $request)
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
				'path'        => 'public/malls',
                'upload_type' => 'single',
                'delete_file' => Mall::find($mall->id)->logo
			]);
		}

        Mall::where('id',$mall->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('malls'));

    }



    public function destroy(Mall $mall)
    {
        Storage::delete($mall->logo);
        $mall->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('malls'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $mall=Mall::find($id);
                Storage::delete($mall->logo);
                $mall->delete();
             }
        }
        else
        {
            $mall=Mall::find(request('item'));
            Storage::delete($mall->logo);
            $mall->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('malls'));
    }




}
