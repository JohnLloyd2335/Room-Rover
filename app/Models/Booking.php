<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id', 'user_id', 'room_id', 'checked_in', 'checked_out', 'amount', 'is_piad', 'status'
    ];
    
}
