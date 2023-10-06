<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\TeamDatatable;

class TeamsController extends Controller
{

    public function index(TeamDatatable $team)
    {
        return $team->render('admin.teams.index',['title'=>trans('admin.teams')]);
    }



    public function create()
    {
      return view('admin.teams.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'nullable',
            'description_ar' => 'nullable',
            'position_ar' => 'nullable',
            'position_en' => 'nullable',
            'active'  => 'required',
            'image'    => 'sometimes|nullable|'.validate_image(),

        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'description_en' => trans('admin.description_en'),
            'description_ar' => trans('admin.description_ar'),
            'position_en' => trans('admin.position_en'),
            'position_ar' => trans('admin.position_ar'),
            'active'   => trans('admin.active'),
            'image'    => trans('admin.image'),
        ]

        );

        if(request()->hasFile('image'))
		{
			$data['image']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'image',
				'path'        => 'public/teams',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Team::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('teams'));


    }



    public function show($id)
    {


    }


    public function edit(Team $team)
    {
        $title=trans('admin.edit');
        return view('admin.teams.edit',compact('team','title'));

    }


    public function update(Team $Team, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'nullable',
            'description_ar' => 'nullable',
            'position_ar' => 'nullable',
            'position_en' => 'nullable',
            'active'  => 'required',
            'image'    => 'sometimes|nullable|'.validate_image(),

        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'description_en' => trans('admin.description_en'),
            'description_ar' => trans('admin.description_ar'),
            'position_en' => trans('admin.position_en'),
            'position_ar' => trans('admin.position_ar'),
            'active'   => trans('admin.active'),
            'image'    => trans('admin.image'),
        ]

        );

        if(request()->hasFile('image'))
		{
			$data['image']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'image',
				'path'        => 'public/teams',
                'upload_type' => 'single',
                'delete_file' => Team::find($team->id)->image
			]);
		}

        Team::where('id',$team->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('teams'));

    }



    public function destroy(Team $team)
    {
        Storage::delete($team->image);
        $team->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('teams'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $team=Team::find($id);
                Storage::delete($team->image);
                $team->delete();
             }
        }
        else
        {
            $team=Team::find(request('item'));
            Storage::delete($team->image);
            $team->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('teams'));
    }



}
