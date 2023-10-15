<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscription extends Model
{
    use HasFactory;
    protected $table    = 'subscriptions';
	protected $fillable = [
		'title_ar',
		'title_en',
        'requirments_ar',
        'requirments_en',
        'benefits_ar',
        'benefits_en',
        'active'
	];

}
