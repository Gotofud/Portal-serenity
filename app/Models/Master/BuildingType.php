<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class BuildingType extends Model
{
    protected $table= 'building_type';
    protected $fillable = [
        'code',
        'name',
    ];

    public function building_Types() {
        return $this->hasMany(BuildingType::class);
    }
}
