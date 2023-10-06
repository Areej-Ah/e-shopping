<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    use HasFactory;
    protected $table    = 'malls';
	protected $fillable = [
		'name_ar',
		'name_en',
		'facebook',
		'twitter',
		'website',
		'email',
		'mobile',
		'address_en',
		'address_ar',
		'active',
		'lat',
		'lng',
		'logo',
	];
}
