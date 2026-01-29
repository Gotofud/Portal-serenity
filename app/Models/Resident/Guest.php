<?php

namespace App\Models\Resident;

use App\Models\Master\GuestTypes;
use App\Models\Resident\User;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    public $table = 'guest';
    protected $fillable = [
        'user_id',
        'Guests_amount',
        'Guest_types',
        'visit_at'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function guest_types()
    {
        return $this->belongsTo(GuestTypes::class, 'guest_types');
    }
}
