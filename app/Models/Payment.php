<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'booking_id', 'payment_method', 'account_holder', 'e-wallet_type', 'credit_card_type', 'reference_number', 'amount', 'description'
    ];

    public function booking() : BelongsTo
    {
        return $this->belongsTo(Booking::class,'booking_id');
    }
}
