<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $fillable = [
        'user_id',
        'vehicle_types',
        'plate_number'
    ];

    public function vehicle_types(){
        return $this->belongsTo(VehicleTypes::class,'vehicle_types');
    }

     public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
