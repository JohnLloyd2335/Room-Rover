<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'details', 'is_available', 'image_path'
    ];
 
    public function category() : BelongsTo 
    {
        return $this->belongsTo(RoomCategory::class);
    }

    public function bookings() : HasMany 
    {
        return $this->hasMany(Booking::class,'room_id');
    }

    public function ratings() : HasMany 
    {
        return $this->hasMany(Rating::class,'room_id');
    }
}
