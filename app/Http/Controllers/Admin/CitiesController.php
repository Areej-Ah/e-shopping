<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\CityDatatable;

class CitiesController extends Controller
{

    public function index(CityDatatable $city)
    {
        return $city->render('admin.cities.index',['title'=>trans('admin.cities')]);
    }



    public function create()
    {
      return view('admin.cities.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'name_en'    => 'required',
            'name_ar'    => 'required',
            'country_id' => 'required|numeric',

        ],[],[

            'name_en'    => trans('admin.name_en'),
            'name_ar'    => trans('admin.name_ar'),
            'country_id' => trans('admin.country_id'),
        ]

        );


        City::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('cities'));


    }



    public function show($id)
    {


    }


    public function edit(City $city)
    {
        $title=trans('admin.edit');
        return view('admin.cities.edit',compact('city','title'));

    }


    public function update(City $city, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'country_id' => 'required|numeric',


        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'country_id' => trans('admin.country_id'),

        ]

        );


        City::where('id',$city->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('cities'));

    }



    public function destroy(City $city)
    {
        $city->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('cities'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $city=City::find($id);
                $city->delete();
             }
        }
        else
        {
            $city=City::find(request('item'));
            $city->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('cities'));
    }




}
