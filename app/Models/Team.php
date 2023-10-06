<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table    = 'teams';
	protected $fillable = [
		'name_ar',
		'name_en',
		'image',
		'description_en',
        'description_ar',
        'position_ar',
        'position_en',
        'active',

	];
}
