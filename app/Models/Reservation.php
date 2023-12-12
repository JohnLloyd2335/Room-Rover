<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'room_id', 'start_date', 'end_date', 'status'
    ];

    public function booking() : HasOne 
    {
        return $this->hasOne(Booking::class);
    }

    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function room() : BelongsTo 
    {
        return $this->belongsTo(Room::class);
    }

    public function startDate() : Attribute 
    {
        return Attribute::make(
            get : fn (string $value) => date('M d, Y',strtotime($value)), 
         
        );
    }

    public function endDate() : Attribute 
    {
        return Attribute::make(
            get : fn (string $value) => date('M d, Y',strtotime($value)),

        );
    }
    
}
