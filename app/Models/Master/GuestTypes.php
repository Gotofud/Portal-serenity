<?php

namespace App\Models\Master;
use Illuminate\Database\Eloquent\Model;

class GuestTypes extends Model
{
    protected $fillable = [
        'name'
    ];

    public function guest_types(){
        return $this->hasMany(GuestTypes::class);
    }
}
