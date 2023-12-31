<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'name',
        'email',
        'password',
        'user_type_id',
        'address',
        'mobile_number',
        'age',
        'gender',
        'dob'
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

    public function userType() : BelongsTo 
    {
        return $this->belongsTo(UserType::class);
    }

    public function reservations() : HasMany 
    {
        return $this->hasMany(Reservation::class);
    }

    public function bookings() : HasMany 
    {
        return $this->hasMany(Booking::class,'user_id');
    }

    public function ratings() : HasMany 
    {
        return $this->hasMany(Rating::class,'user_id');
    }


    public function dob() : Attribute 
    {
        return Attribute::make(
            get : fn($value) => date('M d, Y', strtotime($value))
        );
    }

}
