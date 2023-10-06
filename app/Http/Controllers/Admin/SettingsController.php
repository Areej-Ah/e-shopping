<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Setting;


class SettingsController extends Controller {

	public function setting() {
		return view('admin.settings', ['title' => trans('admin.settings')]);
	}

	public function setting_save(Request $request) {


		$validator = $this->validate(request(),[

			'logo' => validate_image(),
            'logo2' => validate_image(),
			'icon' => validate_image(),
            'video' => 'nullable',
        ], [],
			[
			'logo' => trans('admin.logo'),
            'logo2' => trans('admin.logo2'),
			'icon' => trans('admin.icon'),
            'video' => trans('admin.video'),
			]);

	    $data=request()->except(['_token', '_method']);


		if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/settings',
				'upload_type' => 'single',
				'delete_file' => setting()->logo
			]);
		}

        if(request()->hasFile('logo2'))
		{
			$data['logo2']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo2',
				'path'        => 'public/settings',
				'upload_type' => 'single',
				'delete_file' => setting()->logo2
			]);
		}

		if(request()->hasFile('icon'))
		{
			$data['icon']=up()->upload([

		    	//	'new_name'    => '',
				'file'        => 'icon',
				'path'        => 'public/settings',
				'upload_type' => 'single',
				'delete_file' => setting()->icon
			]);
		}

        if(request()->hasFile('video'))
		{
			$data['video']=up()->upload([

		    	//	'new_name'    => '',
				'file'        => 'video',
				'path'        => 'settings',
				'upload_type' => 'single',
				'delete_file' => setting()->video
			]);
		}

		Setting::orderBy('id', 'desc')->update($data);
		//session()->put('lang',$data['main_lang']);
		session()->flash('success', trans('admin.record_edited'));
		return redirect(aurl('settings'));
	}
}

