<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\InvestmentDatatable;

class InvestmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InvestmentDatatable $investment)
    {
        return $investment->render('admin.investments.index',['title'=>trans('admin.investments')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.investments.create',['title'=>trans('admin.create')]);
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
            'description_ar' =>'required',
            'description_en' =>'required',
            'investment_field_ar' => 'required',
            'investment_field_en' => 'required'

        ],[],[

            'description_ar' => trans('admin.description_ar'),
            'description_en' => trans('admin.description_en'),
            'investment_field_ar' => trans('admin.investment_field_ar'),
            'investment_field_en' => trans('admin.investment_field_en')
        ]

        );



        Investment::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('investments'));


    }



    public function show($id)
    {


    }


    public function edit(Investment $investment)
    {
        $title=trans('admin.edit');
        return view('admin.investments.edit',compact('investment','title'));

    }


    public function update(Investment $investment, Request $request)
    {
        $data = $this->validate(request(),
        [
            'description_ar' =>'required',
            'description_en' =>'required',
            'investment_field_ar' => 'required',
            'investment_field_en' => 'required'

        ],[],[

            'description_ar' => trans('admin.description_ar'),
            'description_en' => trans('admin.description_en'),
            'investment_field_ar' => trans('admin.investment_field_ar'),
            'investment_field_en' => trans('admin.investment_field_en')
        ]

        );



        Investment::where('id',$investment->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('investments'));

    }



    public function destroy(Investment $investment)
    {
        Storage::delete($investment->icon);
        $investment->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('investments'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $investment=Investment::find($id);
                $investment->delete();
             }
        }
        else
        {
            $investment=Investment::find(request('item'));
            $investment->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('investments'));
    }
}
