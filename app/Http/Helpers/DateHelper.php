<?php 

namespace App\Http\Helpers;

class DateHelper 
{

  public static function calculateDaysBetweenTwoDates($date1, $date2)
  {
    $diff = strtotime($date2) - strtotime($date1);

    return abs(round($diff / 86400));
  }

}