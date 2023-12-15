<?php

namespace App\Http\Helpers;

class PaymentHelper
{

  public static function description($amount, $payment_method,$checked_in,$checked_out,$room_name)
  {
    return "Charge of ₱.$amount via $payment_method from $checked_in to $checked_out in $room_name";
  }

}  
