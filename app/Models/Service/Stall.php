<?php

namespace App\Models\Service;

use App\Models\Master\StallPlace;
use App\Models\Resident\User;
use Illuminate\Database\Eloquent\Model;

class Stall extends Model
{
    protected $fillable = [
        'user_id',
        'stall_id',
        'code',
        'status',
        'start_date',
        'end_date',
        'duration',
        'total_cost',
        'notes',
        'paid_at',
    ];

     protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'paid_at' => 'datetime',
    ];


    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function stall_place(){
        return $this->belongsTo(StallPlace::class, 'stall_id');
    }
}
