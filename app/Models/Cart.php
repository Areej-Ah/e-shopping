<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table    = 'carts';
	protected $fillable = [
		'status',
		'seen',
        'cost',
		'active',
        'user_id',
	];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product','product_cart','cart_id','product_id');
    }

}
