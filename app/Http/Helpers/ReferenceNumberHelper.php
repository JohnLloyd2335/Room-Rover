<?php

namespace App\Http\Helpers;

use App\Models\Payment;

class ReferenceNumberHelper
{

  public static function generateRefNumber(): string
  {

    $prefix = "REF";

    $unique_numbers = ReferenceNumberHelper::getRandomNumber();

    $reference_number = $prefix . "#" . $unique_numbers;

    return $reference_number;
  }

  public static function getRandomNumber(): string
  {
    $timestamp = time();
    $unusedDigits = str_shuffle('0123456789');
    $uniqueNumbers = substr($unusedDigits, $timestamp % 10, 13);

    return $uniqueNumbers;
  }
}
