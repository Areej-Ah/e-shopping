<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\NewsDatatable;


class NewsController extends Controller
{
    public function index(NewsDatatable $news)
    {
        return $news->render('admin.news.index',['title'=>trans('admin.news')]);
    }



    public function create()
    {
      return view('admin.news.create',['title'=>trans('admin.create')]);
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
				'path'        => 'public/news',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        News::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('news'));


    }



    public function show($id)
    {


    }


    public function edit(News $news)
    {
        $title=trans('admin.edit');
        return view('admin.news.edit',compact('news','title'));

    }


    public function update(News $news, Request $request)
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
				'path'        => 'public/news',
                'upload_type' => 'single',
                'delete_file' => News::find($news->id)->image
			]);
		}

        News::where('id',$news->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('news'));

    }



    public function destroy(News $news)
    {
        Storage::delete($news->image);
        $news->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('news'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $news=News::find($id);
                Storage::delete($news->image);
                $news->delete();
             }
        }
        else
        {
            $news=News::find(request('item'));
            Storage::delete($news->image);
            $news->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('news'));
    }
}
