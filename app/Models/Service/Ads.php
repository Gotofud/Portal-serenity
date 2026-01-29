<?php

namespace App\Models\Service;

use App\Models\Resident\User;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = [
        'user_id',
        'image',
        'subject',
        'description',
        'status',
        'start_at',
        'active_day'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
