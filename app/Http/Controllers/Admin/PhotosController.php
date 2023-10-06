<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\PhotoDatatable;

class PhotosController extends Controller
{
    public function index(PhotoDatatable $photo)
    {
        return $photo->render('admin.photos.index',['title'=>trans('admin.photos')]);
    }



    public function create()
    {
      return view('admin.photos.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'title_en' => 'required',
            'title_ar' => 'required',
            'image'    => 'sometimes|nullable|'.validate_image(),
            'active'  => 'required',

        ],[],[

            'title_en' => trans('admin.title_en'),
            'title_ar' => trans('admin.title_ar'),
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
				'path'        => 'public/photos',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Photo::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('photos'));


    }



    public function show($id)
    {


    }


    public function edit(Photo $photo)
    {
        $title=trans('admin.edit');
        return view('admin.photos.edit',compact('photo','title'));

    }


    public function update(Photo $photo, Request $request)
    {
        $data = $this->validate(request(),
        [
            'title_en' => 'required',
            'title_ar' => 'required',
            'image'    => 'sometimes|nullable|'.validate_image(),
            'active'  => 'required',

        ],[],[

            'title_en' => trans('admin.title_en'),
            'title_ar' => trans('admin.title_ar'),
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
				'path'        => 'photos',
                'upload_type' => 'single',
                'delete_file' => Photo::find($photo->id)->image
			]);
		}

        Photo::where('id',$photo->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('photos'));

    }



    public function destroy(Photo $photo)
    {
        Storage::delete($photo->image);
        $photo->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('photos'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $photo=Photo::find($id);
                Storage::delete($photo->image);
                $photo->delete();
             }
        }
        else
        {
            $photo=Photo::find(request('item'));
            Storage::delete($photo->image);
            $photo->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('photos'));
    }
}

