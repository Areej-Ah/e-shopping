<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\VideoDatatable;

class VideosController extends Controller
{
    public function index(VideoDatatable $video)
    {
        return $video->render('admin.videos.index',['title'=>trans('admin.videos')]);
    }



    public function create()
    {
      return view('admin.videos.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'title_en' => 'required',
            'title_ar' => 'required',
            'video'    => 'required',
            'active'  => 'required',

        ],[],[

            'title_en' => trans('admin.title_en'),
            'title_ar' => trans('admin.title_ar'),
            'title_ar' => trans('admin.title_ar'),
            'video'    => trans('admin.video'),
            'active'   => trans('admin.active'),
        ]

        );


        Video::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('videos'));


    }



    public function show($id)
    {


    }


    public function edit(Video $video)
    {
        $title=trans('admin.edit');
        return view('admin.videos.edit',compact('video','title'));

    }


    public function update(Video $video, Request $request)
    {
        $data = $this->validate(request(),
        [
            'title_en' => 'required',
            'title_ar' => 'required',
            'video'    => 'required',
            'active'  => 'required',

        ],[],[

            'title_en' => trans('admin.title_en'),
            'title_ar' => trans('admin.title_ar'),
            'title_ar' => trans('admin.title_ar'),
            'video'    => trans('admin.video'),
            'active'   => trans('admin.active'),
        ]

        );


        Video::where('id',$video->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('videos'));

    }



    public function destroy(Video $video)
    {
        $video->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('videos'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $video=Video::find($id);
                $video->delete();
             }
        }
        else
        {
            $video=Video::find(request('item'));
            $video->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('videos'));
    }
}
