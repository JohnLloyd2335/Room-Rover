<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', 'user_id', 'room_id', 'rating', 'comment', 'rating_date'
    ];

    public function booking() : BelongsTo 
    {
        return $this->belongsTo(Booking::class,'booking_id');
    }

    public function room() : BelongsTo 
    {
        return $this->belongsTo(Room::class,'room_id');
    }

    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function ratingDate() : Attribute 
    {
        return Attribute::make(
            get : fn($value) => date('M d, Y h:i A', strtotime($value))
        );
    }
}
