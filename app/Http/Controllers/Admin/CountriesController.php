<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\CountryDatatable;

class CountriesController extends Controller
{

    public function index(CountryDatatable $country)
    {
        return $country->render('admin.countries.index',['title'=>trans('admin.countries')]);
    }



    public function create()
    {
      return view('admin.countries.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'iso'     => 'required',
            'code'    => 'required',
            'logo'    => 'required|'.validate_image(),

        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'iso'     => trans('admin.iso'),
            'code'    => trans('admin.code'),
            'logo'    => trans('admin.logo'),
        ]

        );

        if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/countries',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Country::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('countries'));


    }



    public function show($id)
    {


    }


    public function edit(Country $country)
    {
        $title=trans('admin.edit');
        return view('admin.countries.edit',compact('country','title'));

    }


    public function update(Country $country, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'iso'     => 'required',
            'code'    => 'required',
            'logo'    => 'sometimes|nullable|'.validate_image(),

        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'iso'     => trans('admin.iso'),
            'code'    => trans('admin.code'),
            'logo'    => trans('admin.logo'),
        ]

        );

        if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/countries',
                'upload_type' => 'single',
                'delete_file' => Country::find($country->id)->logo
			]);
		}

        Country::where('id',$country->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('countries'));

    }



    public function destroy(Country $country)
    {
        Storage::delete($country->logo);
        $country->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('countries'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $country=Country::find($id);
                Storage::delete($country->logo);
                $country->delete();
             }
        }
        else
        {
            $country=Country::find(request('item'));
            Storage::delete($country->logo);
            $country->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('countries'));
    }




}
