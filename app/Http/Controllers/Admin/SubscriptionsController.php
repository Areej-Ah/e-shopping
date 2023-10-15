<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\SubscriptionDatatable;

class SubscriptionsController extends Controller
{

    public function index(SubscriptionDatatable $subscription)
    {
        return $subscription->render('admin.subscriptions.index',['title'=>trans('admin.subscriptions')]);
    }


    public function create()
    {
      return view('admin.subscriptions.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'title_en' => 'required',
            'title_ar' => 'required',
            'requirments_ar' => 'required',
            'requirments_en' => 'required',
            'benefits_ar' => 'required',
            'benefits_en' => 'required',
            'active'  => 'required'

        ],[],[

            'title_en'       => trans('admin.title_en'),
            'title_ar'       => trans('admin.title_ar'),
            'requirments_ar' => trans('admin.requirments_ar'),
            'requirments_en' => trans('admin.requirments_en'),
            'benefits_ar'    => trans('admin.benefits_ar'),
            'benefits_en'    => trans('admin.benefits_en'),
            'active'         => trans('admin.active')
        ]

        );


        Subscription::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('subscriptions'));


    }



    public function show($id)
    {


    }


    public function edit(Subscription $subscription)
    {
        $title=trans('admin.edit');
        return view('admin.subscriptions.edit',compact('subscription','title'));

    }


    public function update(Subscription $subscription, Request $request)
    {
        $data = $this->validate(request(),
        [
            'title_en' => 'required',
            'title_ar' => 'required',
            'requirments_ar' => 'required',
            'requirments_en' => 'required',
            'benefits_ar' => 'required',
            'benefits_en' => 'required',
            'active'  => 'required'

        ],[],[

            'title_en'       => trans('admin.title_en'),
            'title_ar'       => trans('admin.title_ar'),
            'requirments_ar' => trans('admin.requirments_ar'),
            'requirments_en' => trans('admin.requirments_en'),
            'benefits_ar'    => trans('admin.benefits_ar'),
            'benefits_en'    => trans('admin.benefits_en'),
            'active'         => trans('admin.active')
        ]

        );


        Subscription::where('id',$subscription->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('subscriptions'));

    }



    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('subscriptions'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $subscription=Subscription::find($id);
                $subscription->delete();
             }
        }
        else
        {
            $subscription=Subscription::find(request('item'));
            $subscription->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('subscriptions'));
    }




}
