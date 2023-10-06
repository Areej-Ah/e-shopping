<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Form;
use Carbon\Carbon;
use App\DataTables\StateDatatable;

class StatesController extends Controller
{

    public function index(StateDatatable $state)
    {
        return $state->render('admin.states.index',['title'=>trans('admin.states')]);
    }



    public function create()
    {
      if(request()->ajax())
      {
        if (request()->has('country_id'))
        {
            $select=request()->has('select')?request('select'):'';
            return Form::select('city_id', City::Where('country_id',request('country_id'))->pluck('name_'.session('lang'),'id'),$select,['class'=>'form-control','placeholder'=>'......']);
        }
      }

      return view('admin.states.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'name_en'    => 'required',
            'name_ar'    => 'required',
            'country_id' => 'required|numeric',
            'city_id'    => 'required|numeric',

        ],[],[

            'name_en'    => trans('admin.name_en'),
            'name_ar'    => trans('admin.name_ar'),
            'country_id' => trans('admin.country_id'),
            'city_id'    => trans('admin.city_id'),
        ]

        );


        State::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('states'));


    }



    public function show($id)
    {


    }


    public function edit(State $state)
    {
        $title=trans('admin.edit');
        return view('admin.states.edit',compact('state','title'));

    }


    public function update(State $state, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name_en'    => 'required',
            'name_ar'    => 'required',
            'country_id' => 'required|numeric',
            'city_id'    => 'required|numeric',


        ],[],[

            'name_en'    => trans('admin.name_en'),
            'name_ar'    => trans('admin.name_ar'),
            'country_id' => trans('admin.country_id'),
            'city_id'    => trans('admin.city_id'),

        ]

        );


        State::where('id',$state->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('states'));

    }



    public function destroy(State $state)
    {
        $state->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('states'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $state=State::find($id);
                $state->delete();
             }
        }
        else
        {
            $state=State::find(request('item'));
            $state->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('states'));
    }




}
