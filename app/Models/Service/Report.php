<?php

namespace App\Models\Service;

use App\Models\Resident\User;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'subject',
        'description',
        'image',
    ];

     public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
