<?php

namespace App\Models\Finance;

use App\Models\Master\BuildingType;
use App\Models\Master\CommunityUnit;
use Illuminate\Database\Eloquent\Model;

class CommunityUnitAggrements extends Model
{
    protected $fillable = [
        'community_id',
        'building_types_id',
        'bill_amount',
        'status'
    ];

    public function communityUnits()
    {
        return $this->belongsTo(CommunityUnit::class, 'community_id');
    }

     public function building_Types()
    {
        return $this->belongsTo(BuildingType::class, 'building_types_id');
    }

    public function cuAgreement(){
        return $this->hasMany(CommunityUnitAggrements::class);
    }

}
