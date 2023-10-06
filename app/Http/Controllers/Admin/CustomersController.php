<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\CustomersDataTable;

class CustomersController extends Controller
{

    public function index(CustomersDataTable $dataTable)
    {
        return $dataTable->render('admin.customers.index',['title'=>trans('admin.customers')]);
    }



    public function create()
    {
      return view('admin.customers.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'logo'    => 'required|'.validate_image(),
            'show'  => 'required',

        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'logo'    => trans('admin.logo'),
            'show'    => trans('admin.show'),
        ]

        );

        if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/customers',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Customer::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('customers'));


    }



    public function show($id)
    {


    }


    public function edit(Customer $customer)
    {
        $title=trans('admin.edit');
        return view('admin.customers.edit',compact('customer','title'));

    }


    public function update(Customer $customer, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'logo'    => 'sometimes|nullable|'.validate_image(),
            'show'  => 'required',

        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'logo'    => trans('admin.logo'),
            'show'    => trans('admin.show'),

        ]

        );

        if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/customers',
                'upload_type' => 'single',
                'delete_file' => Customer::find($customer->id)->logo
			]);
		}

        Customer::where('id',$customer->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('customers'));

    }



    public function destroy(Customer $customer)
    {
        Storage::delete($customer->logo);
        $customer->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('customers'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $customer=Customer::find($id);
                Storage::delete($customer->logo);
                $customer->delete();
             }
        }
        else
        {
            $customer=Customer::find(request('item'));
            Storage::delete($customer->logo);
            $customer->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('customers'));
    }



}
