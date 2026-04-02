<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class ReportCategories extends Model
{
    protected $fillable = [
        'name',
        'types'
    ];

    public function reportCategories() {
        return $this->hasMany(ReportCategories::class);
    }
}
