<?php

namespace App\Models\User;

use App\Models\Master\House;
use App\Models\Resident\User;
use Illuminate\Database\Eloquent\Model;

class UsersHouse extends Model
{
    public $table = 'users_house';

    protected $fillable = [
        'user_id',
        'house_id',
        'is_primary',
        'total_resident',
        'status',
    ];

    public function houses()
    {
        return $this->belongsTo(House::class, 'house_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
