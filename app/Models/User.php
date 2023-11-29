<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class,'user_uuid','uuid');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class,'user_uuid','uuid');
    }

    public function portofolio()
    {
        return $this->hasMany(Portofolios::class,'user_uuid','uuid');
    }

    public function experience()
    {
        return $this->hasMany(Experience::class,'user_uuid','uuid');
    }

    public function education()
    {
        return $this->hasMany(Education::class,'user_uuid','uuid');
    }
}
