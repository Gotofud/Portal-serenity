<?php

namespace App\Models\User;

use App\Models\Resident\User;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    public $table = 'users_profile';
    protected $fillable = [
        'user_id',
        'full_name',
        'bod',
        'pod',
        'gender',
        'citizenship',
        'address',
        'religion',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
