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
        'is_publish',
    ];


    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
