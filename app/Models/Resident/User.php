<?php

namespace App\Models\Resident;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App;
use App\Models\User\UserProfile;
use App\Models\User\UsersHouse;
use App\Models\Vehicles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
       use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'avatar',
        'status',
        'role_id',
        'otp',
        'otp_expires_at',
        'is_verified',
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }

    public function roles()
    {
        return $this->belongsTo(App\Models\Master\Role::class,'role_id');
    }

    public function user_profile(){
        return $this->hasOne(UserProfile::class);
    }
    
    public function user_house(){
        return $this->hasOne(UsersHouse::class);
    }

    public function user_vehicle(){
        return $this->hasMany(Vehicles::class);
    }

    public function neighborhoodOperator()
    {
        return $this->hasOne(NeighborhoodOperator::class, 'user_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'otp_expires_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
