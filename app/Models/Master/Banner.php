<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title',
        'image',
        'status',
        'expired_at'
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'expired_at' => 'datetime',
    ];

}
