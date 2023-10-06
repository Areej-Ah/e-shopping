<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttributeFamily;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\AttributeFamilyDatatable;

class AttributeFamiliesController extends Controller
{

    public function index(AttributeFamilyDatatable $AttributeFamily)
    {
        return $AttributeFamily->render('admin.attribute_families.index',['title'=>trans('admin.attribute_family_id')]);
    }



    public function create()
    {
      return view('admin.attribute_families.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'code'    => ['required', 'unique:attribute_families'],
            'name_ar' => 'required',
            'name_en' => '',

        ],[],[

            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),
            'code'    => trans('admin.code_attr'),
        ]

        );



        AttributeFamily::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('attribute_families'));


    }



    public function show($id)
    {
        //
    }


    public function edit(AttributeFamily $attributeFamily)
    {
        $title=trans('admin.edit');
        return view('admin.attribute_families.edit',compact('attributeFamily','title'));

    }


    public function update(AttributeFamily $attributeFamily, Request $request)
    {
        $data = $this->validate(request(),
        [
            'code'    => ['required', 'unique:attribute_families'],
            'name_ar' => 'required',
            'name_en' => '',

        ],[],[

            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),
            'code'    => trans('admin.code_attr'),
        ]

        );



        AttributeFamily::where('id',$attributeFamily->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('attribute_families'));

    }



    public function destroy(AttributeFamily $attributeFamily)
    {
        $attributeFamily->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('attribute_families'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $attributeFamily=AttributeFamily::findOrFail($id);
                $attributeFamily->delete();
             }
        }
        else
        {
            $attributeFamily=AttributeFamily::find(request('item'));
            $attributeFamily->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('attribute_families'));
    }




}
