<?php

namespace App\Models\Service;

use App\Models\Resident\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'question',
        'reply',
        'replied_at'
    ];

    protected $casts = [
        'replied_at' => 'datetime',
    ];
}
