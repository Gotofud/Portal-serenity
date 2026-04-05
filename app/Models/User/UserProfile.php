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
        'telephone_num',
        'bod',
        'pob',
        'gender',
        'citizenship',
        'nik',
        'nkk',
        'family_status',
        'religion',
    ];

    protected $casts = [
        'bod' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
