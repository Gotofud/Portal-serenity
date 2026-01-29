<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class VehicleTypes extends Model
{
    protected $fillable = [
        'name'
    ];

    public function vehicle_types(){
        return $this->hasMany(VehicleTypes::class);
    }
    
}
