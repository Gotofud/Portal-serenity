<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class CommunityUnit extends Model
{
    protected $fillable = [
        'no',
        'leader_name',  
    ];

    public function communityUnits()
    {
        return $this->hasMany(CommunityUnit::class);
    }
}
