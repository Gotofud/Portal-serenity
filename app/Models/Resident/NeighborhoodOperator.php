<?php

namespace App\Models\Resident;

use App\Models\Master\CommunityUnit;
use App\Models\Master\NeighborhoodUnit;
use Illuminate\Database\Eloquent\Model;

class NeighborhoodOperator extends Model
{
    protected $fillable = [
        'user_id',
        'community_id',
        'neighborhood_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function communityUnits()
    {
        return $this->belongsTo(CommunityUnit::class, 'community_id');
    }

    public function neighborhoodUnits()
    {
        return $this->belongsTo(NeighborhoodUnit::class, 'neighborhood_id');
    }
}
