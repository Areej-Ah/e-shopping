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
        'price_guarantee_ar',
        'price_guarantee_en',
        'quality_assurance_ar',
        'quality_assurance_en',
        'after_sales_service_ar',
        'after_sales_service_en',
        'phone',
        'mobile',
        'logo2',
        'video',
        'employment_email',
        'slogan_en',
        'slogan_ar',
        'number_of_head_office',
        'number_of_product',
        'number_of_client',
        'number_of_certificate',
	];
}
