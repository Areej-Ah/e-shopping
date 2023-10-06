<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table    = 'departments';
	protected $fillable = [
		'dep_name_ar',
        'dep_name_en',
        'icon',
        'description_ar',
        'description_en',
        'keyword',
        'parent',
        'active',
	];



    public function parents() {
        return $this->hasMany(Department::class,'id', 'parent');
    }
}
