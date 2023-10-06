<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table    = 'news';
	protected $fillable = [
		'title_ar',
        'title_en',
        'text_ar',
        'text_en',
        'image',
        'active',
	];
}
