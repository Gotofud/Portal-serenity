<?php

namespace App\Models\Service;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'image',
        'image_subtitle',
        'title',
        'news_types',
        'description',
        'status',
        'views',
        'upload_at'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
