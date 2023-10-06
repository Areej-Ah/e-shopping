<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\ShippingDatatable;

class ShippingsController extends Controller
{

    public function index(ShippingDatatable $shipping)
    {
        return $shipping->render('admin.shippings.index',['title'=>trans('admin.shippings')]);
    }



    public function create()
    {
      return view('admin.shippings.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'logo'    => 'required|'.validate_image(),
            'active'  => 'required',
            'user_id' => 'required',
            'lat'     => 'sometimes|nullable',
            'lng'     => 'sometimes|nullable',


        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'active'  => trans('admin.activation'),
            'lat'     => trans('admin.lat'),
            'lng'     => trans('admin.lng'),
            'user_id' => trans('admin.owner'),

        ]

        );

        if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/shippings',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Shipping::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('shippings'));


    }



    public function show($id)
    {


    }


    public function edit(Shipping $shipping)
    {
        $title=trans('admin.edit');
        return view('admin.shippings.edit',compact('shipping','title'));

    }


    public function update(Shipping $shipping, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'logo'    => 'sometimes|nullable|'.validate_image(),
            'user_id' => 'required',
            'active'  => 'required',
            'lat'     => 'sometimes|nullable',
            'lng'     => 'sometimes|nullable',


        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'user_id' => trans('admin.owner'),
            'active'  => trans('admin.activation'),
            'lat'     => trans('admin.lat'),
            'lng'     => trans('admin.lng'),

        ]

        );

        if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/shippings',
                'upload_type' => 'single',
                'delete_file' => Shipping::find($shipping->id)->logo
			]);
		}

        Shipping::where('id',$shipping->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('shippings'));

    }



    public function destroy(Shipping $shipping)
    {
        Storage::delete($shipping->logo);
        $shipping->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('shippings'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $shipping=Shipping::find($id);
                Storage::delete($shipping->logo);
                $shipping->delete();
             }
        }
        else
        {
            $shipping=Shipping::find(request('item'));
            Storage::delete($shipping->logo);
            $shipping->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('shippings'));
    }




}
