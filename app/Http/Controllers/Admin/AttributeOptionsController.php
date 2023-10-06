<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttributeOption;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\AttributeOptionDatatable;

class AttributeOptionsController extends Controller
{

    public function index(AttributeOptionDatatable $attributeOption)
    {
        return $attributeOption->render('admin.attribute_options.index',['title'=>trans('admin.attribute_options')]);
    }



    public function create()
    {
      return view('admin.attribute_options.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'name_en'    => '',
            'name_ar'    => 'required',
            'code'       => '',
            'attribute_id' => 'required|numeric',

        ],[],[

            'name_en'      => trans('admin.name_en'),
            'name_ar'      => trans('admin.name_ar'),
            'code'         => trans('admin.code_atrr'),
            'attribute_id' => trans('admin.country_id'),
        ]

        );


        AttributeOption::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('attribute_options'));


    }



    public function show($id)
    {


    }


    public function edit(AttributeOption $attributeOption)
    {
        $title=trans('admin.edit');
        return view('admin.attribute_options.edit',compact('attributeOption','title'));

    }


    public function update(AttributeOption $attributeOption, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name_en'    => '',
            'code'       => '',
            'name_ar'    => 'required',
            'attribute_id' => 'required|numeric',


        ],[],[

            'name_en'      => trans('admin.name_en'),
            'name_ar'      => trans('admin.name_ar'),
            'code'         => trans('admin.code_atrr'),
            'attribute_id' => trans('admin.country_id'),

        ]

        );


        AttributeOption::where('id',$attributeOption->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('attribute_options'));

    }



    public function destroy(AttributeOption $attributeOption)
    {
        $attributeOption->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('attribute_options'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $attributeOption=AttributeOption::find($id);
                $attributeOption->delete();
             }
        }
        else
        {
            $attributeOption=AttributeOption::find(request('item'));
            $attributeOption->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('attribute_options'));
    }




}
