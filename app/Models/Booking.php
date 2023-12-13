<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id', 'user_id', 'room_id', 'checked_in', 'checked_out', 'amount', 'is_paid', 'status'
    ];

    public function reservation() : BelongsTo 
    {
        return $this->belongsTo(Reservation::class);
    }

    public function checkedIn() : Attribute 
    {
        return Attribute::make( 
            get : fn(string $value) => date('M d, Y', strtotime($value))
        );
    }

    public function checkedOut() : Attribute 
    {
        return Attribute::make( 
            get : fn(string $value) => date('M d, Y', strtotime($value))
        );
    }
    
}
