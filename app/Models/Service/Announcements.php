<?php

namespace App\Models\Service;

use App\Models\Resident\User;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    protected $fillable = [
        'user_id',
        'subject',
        'description',
        'image',
        'status',
        'publish_at'
    ];

       public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
