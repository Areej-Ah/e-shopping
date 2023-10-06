<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;
    protected $table    = 'investments';
	protected $fillable = [
        'description_ar',
        'description_en',
        'investment_field_ar',
        'investment_field_en'

	];
}
