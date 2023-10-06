<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceFile extends Model
{
    use HasFactory;
    protected $table    = 'service_files';
	protected $fillable = [
		'title_en',
        'title_ar',
        'text_ar',
        'text_en',
        'file',
        'active',
        'service_id',

	];
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
