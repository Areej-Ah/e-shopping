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



    public function children()
    {
        return $this->hasMany(Department::class, 'parent');
    }

    public function departmentHierarchy()
    {
        $departments = $this->with('children')
        ->whereNull('parent')
        ->where('active', 1)
        ->get();

    $formatDepartments = function ($departments) use (&$formatDepartments) {
        $formattedDepartments = [];

        foreach ($departments as $department) {
            $formattedDepartment = $department->toArray();
            $children = $formatDepartments($department->children()->where('active', 1)->get());
            $formattedDepartment['children'] = $children;
            $formattedDepartments[] = $formattedDepartment;
        }

        return $formattedDepartments;
    };

    return $formatDepartments($departments);

    }
}
