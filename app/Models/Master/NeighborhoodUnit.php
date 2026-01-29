<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\CommunityUnit;

class NeighborhoodUnit extends Model
{
    protected $fillable = [
        'no',
        'community_id',
        'leader_name',
        'status',
    ];


    public function communityUnits()
    {
        return $this->belongsTo(CommunityUnit::class, 'community_id');
    }

    public function neighborhoodUnits()
    {
        return $this->hasMany(NeighborhoodUnit::class);
    }
}
