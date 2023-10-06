<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table    = 'categories';
	protected $fillable = [
		'name_ar',
        'name_en',
        'icon',
        'description_ar',
        'description_en',
        'keyword',
        'parent',
        'active',
	];




    public function parents() {
        return $this->hasMany(Category::class,'id','parent');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent','id');
    }
}
