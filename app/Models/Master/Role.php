<?php

namespace App\Models\Master;

use App\Models\Resident\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }

}
