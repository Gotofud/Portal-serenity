<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
        'community_id',
        'neighborhood_id',
        'name',
    ];

  public function communityUnits()
    {
        return $this->belongsTo(CommunityUnit::class, 'community_id');
    }

     public function neighborhoodUnits(){
        return $this->belongsTo(NeighborhoodUnit::class,'neighborhood_id');
    }
}
