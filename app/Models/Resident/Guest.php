<?php

namespace App\Models\Resident;

use App\Models\Master\GuestTypes;
use App\Models\Master\House;
use App\Models\Resident\User;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    public $table = 'guest';
    protected $fillable = [
        'user_id',
        'Guests_amount',
        'Guest_types',
        'visit_at',
        'house_id'
    ];
    protected $casts = [
        'visit_at' => 'datetime',
    ];


    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function guestTypes()
    {
        return $this->belongsTo(GuestTypes::class, 'guest_types');
    }
    public function houses()
    {
        return $this->belongsTo(House::class, 'house_id');
    }
}
