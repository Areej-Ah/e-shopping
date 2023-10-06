<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\SliderDatatable;


class SliderController extends Controller
{
    public function index(SliderDatatable $slider)
    {
        return $slider->render('admin.slider.index',['title'=>trans('admin.slider')]);
    }



    public function create()
    {
      return view('admin.slider.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'title_en' => 'required',
            'title_ar' => 'required',
            'text_ar' => 'required',
            'text_en' => 'required',
            'image'    => 'sometimes|nullable|'.validate_image(),
            'active'  => 'required',

        ],[],[

            'title_en' => trans('admin.title_en'),
            'title_ar' => trans('admin.title_ar'),
            'text_ar' => trans('admin.text_ar'),
            'text_en' => trans('admin.text_en'),
            'title_ar' => trans('admin.title_ar'),
            'image'    => trans('admin.image'),
            'active'   => trans('admin.active'),
        ]

        );

        if(request()->hasFile('image'))
		{
			$data['image']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'image',
				'path'        => 'public/sliders',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Slider::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('slider'));


    }



    public function show($id)
    {


    }


    public function edit(Slider $slider)
    {
        $title=trans('admin.edit');
        return view('admin.slider.edit',compact('slider','title'));

    }


    public function update(Slider $slider, Request $request)
    {
        $data = $this->validate(request(),
        [
            'title_en' => 'required',
            'title_ar' => 'required',
            'text_ar' => 'required',
            'text_en' => 'required',
            'image'    => 'sometimes|nullable|'.validate_image(),
            'active'  => 'required',

        ],[],[

            'title_en' => trans('admin.title_en'),
            'title_ar' => trans('admin.title_ar'),
            'text_ar' => trans('admin.text_ar'),
            'text_en' => trans('admin.text_en'),
            'title_ar' => trans('admin.title_ar'),
            'image'    => trans('admin.image'),
            'active'   => trans('admin.active'),
        ]

        );

        if(request()->hasFile('image'))
		{
			$data['image']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'image',
				'path'        => 'public/sliders',
                'upload_type' => 'single',
                'delete_file' => Slider::find($slider->id)->image
			]);
		}

        Slider::where('id',$slider->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('slider'));

    }



    public function destroy(Slider $slider)
    {
        Storage::delete($slider->image);
        $slider->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('slider'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $slider=Slider::find($id);
                Storage::delete($slider->image);
                $slider->delete();
             }
        }
        else
        {
            $slider=Slider::find(request('item'));
            Storage::delete($slider->image);
            $slider->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('slider'));
    }
}
