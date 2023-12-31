<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table    = 'brands';
	protected $fillable = [
		'name_ar',
		'name_en',
		'text_ar',
		'text_en',
		'logo',
		'active',
	];
}
