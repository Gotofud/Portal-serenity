<?php

namespace App\Models\Finance;

use App\Models\Master\House;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $fillable = [
        'house_id',
        'code',
        'year',
        'month',
        'amount',
        'file',
        'status',
        'paid_at',
        'due_at',
    ];

    protected function casts(): array
    {
        return [
            'due_at' => 'datetime',
            'paid_at' => 'datetime',
        ];
    }

     public function houses()
    {
        return $this->belongsTo(House::class,'house_id');
    }
    
}
