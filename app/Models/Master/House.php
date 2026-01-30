<?php

namespace App\Models\Master;

use App\Models\User\UsersHouse;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'building_types_id',
        'neighborhood_id',
        'community_id',
        'block_id',
        'number',
        'status',
    ];

    public function communityUnits()
    {
        return $this->belongsTo(CommunityUnit::class, 'community_id');
    }

    public function neighborhoodUnits()
    {
        return $this->belongsTo(NeighborhoodUnit::class, 'neighborhood_id');
    }

    public function building_Types()
    {
        return $this->belongsTo(BuildingType::class, 'building_types_id');
    }

    public function blocks()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    public function houses()
    {
        return $this->hasMany(House::class);
    }
    public function usersHouses()
    {
        return $this->hasMany(UsersHouse::class);
    }

}
