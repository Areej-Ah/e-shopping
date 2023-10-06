<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\SocialMediaDatatable;

class SocialMediaController extends Controller
{

    public function index(SocialMediaDatatable $media)
    {
        return $media->render('admin.social_media.index',['title'=>trans('admin.social_media')]);
    }



    public function create()
    {
      return view('admin.social_media.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'name_ar' => 'required',
            'name_en' => 'required',
            'icon' => 'nullable',
            'link'    => 'nullable',
            'active'  => 'required',

        ],[],[
            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),
            'link'    => trans('admin.link'),
            'icon'    => trans('admin.icon'),
            'active'    => trans('admin.active'),
        ]

        );



        SocialMedia::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('social_media'));


    }



    public function show($id)
    {


    }


    public function edit(SocialMedia $socialMedia)
    {
        $title=trans('admin.edit');
        return view('admin.social_media.edit',compact('socialMedia','title'));

    }


    public function update(SocialMedia $socialMedia, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name_ar' => 'required',
            'name_en' => 'required',
            'icon' => 'nullable',
            'link'    => 'nullable',
            'active'  => 'required',

        ],[],[

            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),
            'link'    => trans('admin.link'),
            'icon'    => trans('admin.icon'),
            'active'    => trans('admin.active'),
        ]

        );



        SocialMedia::where('id',$socialMedia->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('social_media'));

    }



    public function destroy(SocialMedia $socialMedia)
    {

        $socialMedia->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('social_media'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $media=SocialMedia::find($id);
                $media->delete();
             }
        }
        else
        {
            $media=SocialMedia::find(request('item'));
            $media->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('social_media'));
    }




}
