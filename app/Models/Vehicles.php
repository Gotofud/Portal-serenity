<?php

namespace App\Models;

use App\Models\Master\VehicleTypes;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $fillable = [
        'user_id',
        'vehicle_types',
        'plate_number'
    ];

    public function vehicleTypes(){
        return $this->belongsTo(VehicleTypes::class,'vehicle_types');
    }

     public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
