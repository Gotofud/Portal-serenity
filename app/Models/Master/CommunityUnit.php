<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class CommunityUnit extends Model
{
    protected $fillable = [
        'name',
    ];

    public function communityUnits()
    {
        return $this->hasMany(CommunityUnit::class);
    }
}
