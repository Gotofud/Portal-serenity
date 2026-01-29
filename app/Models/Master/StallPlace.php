<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class StallPlace extends Model
{
    protected $fillable = [
        'community_id',
        'neighborhood_id',
        'name',
        'stall_unit',
        'rent_amount'
    ];

    public function communityUnits()
    {
        return $this->belongsTo(CommunityUnit::class, 'community_id');
    }

    public function neighborhoodUnits()
    {
        return $this->belongsTo(NeighborhoodUnit::class, 'neighborhood_id');
    }
}
