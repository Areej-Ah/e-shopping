<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\AttributeDatatable;

class AttributesController extends Controller
{

    public function index(AttributeDatatable $attribute)
    {
        return $attribute->render('admin.attributes.index',['title'=>trans('admin.attributes')]);
    }



    public function create()
    {
      return view('admin.attributes.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'code'                => ['required', 'unique:attributes'],
            'name_ar'             => 'required',
            'name_en'             => '',
            'attribute_family_id' => 'required|numeric',

        ],[],[

            'name_ar'             => trans('admin.name_ar'),
            'name_en'             => trans('admin.name_en'),
            'code'                => trans('admin.code_attr'),
            'attribute_family_id' => trans('admin.attribute_family_id'),
        ]

        );



        Attribute::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('attributes'));


    }



    public function show($id)
    {
        //
    }


    public function edit(Attribute $attribute)
    {
        $title=trans('admin.edit');
        return view('admin.attributes.edit',compact('attribute','title'));

    }


    public function update(Attribute $attribute, Request $request)
    {
        $data = $this->validate(request(),
        [
            'code'                => ['required', 'unique:attributes'],
            'name_ar'             => 'required',
            'name_en'             => '',
            'attribute_family_id' => 'required|numeric',

        ],[],[

            'name_ar'             => trans('admin.name_ar'),
            'name_en'             => trans('admin.name_en'),
            'code'                => trans('admin.code_attr'),
            'attribute_family_id' => trans('admin.attribute_family_id'),
        ]

        );



        Attribute::where('id',$attribute->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('attributes'));

    }



    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('attributes'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $attribute=Attribute::findOrFail($id);
                $attribute->delete();
             }
        }
        else
        {
            $attribute=Attribute::find(request('item'));
            $attribute->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('attributes'));
    }




}
