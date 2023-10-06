<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table    = 'settings';
	protected $fillable = [
		'sitename_ar',
		'sitename_en',
		'logo',
		'icon',
		'email',
		'description_en',
		'keywords',
		'status',
		'message_maintenance',
		'main_lang',
        'description_ar',
        'message_ar',
        'message_en',
        'vision_ar',
        'vision_en',
        'values_ar',
        'values_en',
        'location_ar',
        'location_en',
        'about_ar',
        'about_en',
        'objective_ar',
        'objective_en',
        'quality_policy_ar',
        'quality_policy_en',
        'corporate_mission_ar',
        'corporate_mission_en',
        'phone',
        'mobile',
        'logo2',
        'video',
        'employment_email',
        'slogan_en',
        'slogan_ar',
        'number_of_marketing_strategy',
        'number_of_new_ideas',
        'number_of_done_projects',
        'number_of_happy_customers',

	];
}
