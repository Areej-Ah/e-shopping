<?php

namespace App\Models;
use App\Models\City;
use App\Models\Country;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table    = 'states';
	protected $fillable = [
		'name_ar',
        'name_en',
        'city_id',
        'country_id',
	];



    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
