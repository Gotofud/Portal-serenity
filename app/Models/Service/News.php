<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'code',
        'image',
        'title',
        'news_types',
        'description',
        'status',
        'views',
        'upload_at'
    ];
}
