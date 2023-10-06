<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\BrandDatatable;

class BrandsController extends Controller
{

    public function index(BrandDatatable $brand)
    {
        return $brand->render('admin.brands.index',['title'=>trans('admin.brands')]);
    }



    public function create()
    {
      return view('admin.brands.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'logo'    => 'required|'.validate_image(),

        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'logo'    => trans('admin.logo'),
        ]

        );

        if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/brands',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Brand::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('brands'));


    }



    public function show($id)
    {


    }


    public function edit(Brand $brand)
    {
        $title=trans('admin.edit');
        return view('admin.brands.edit',compact('brand','title'));

    }


    public function update(Brand $brand, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'logo'    => 'sometimes|nullable|'.validate_image(),

        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'logo'    => trans('admin.logo'),
        ]

        );

        if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/brands',
                'upload_type' => 'single',
                'delete_file' => Brand::find($brand->id)->logo
			]);
		}

        Brand::where('id',$brand->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('brands'));

    }



    public function destroy(Brand $brand)
    {
        Storage::delete($brand->logo);
        $brand->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('brands'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $brand=Brand::find($id);
                Storage::delete($brand->logo);
                $brand->delete();
             }
        }
        else
        {
            $brand=Brand::find(request('item'));
            Storage::delete($brand->logo);
            $brand->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('brands'));
    }




}
