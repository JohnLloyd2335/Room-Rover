<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'booking_id', 'payment_method', 'account_holder', 'e-wallet_type', 'credit_card_type', 'reference_number', 'amount', 'description', 'payment_date'
    ];

    public function booking() : BelongsTo
    {
        return $this->belongsTo(Booking::class,'booking_id');
    }

    public function createdAt() : Attribute 
    {
        return Attribute::make( 
            get : fn($value) => date('M d, Y h:i A',strtotime($value))
        );
    }

    public function paymentDate() : Attribute 
    {
        return Attribute::make(
            get : fn($value) => date('M d, Y h:i A', strtotime($value))
        );
    }
}
