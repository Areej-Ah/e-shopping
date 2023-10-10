<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table    = 'products';
	protected $fillable = [
		'title',
		'content',
        'photo',
		'stock',
        'price',
        'start_at',
		'end_at',
        'start_offer_at',
		'end_offer_at',
        'price_offer',
        'status',
        'reason',
		'department_id',
        'other_data',

	];
    public function other_data()
    {
        return $this->hasMany(\App\Models\OtherData::class, 'product_id', 'id');
    }
    public function files(){
        return $this->hasMany('App\File','relation_id','id')->where('file_type','product');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class,'cart_product')->withPivot('quantity', 'cost');
    }

}
