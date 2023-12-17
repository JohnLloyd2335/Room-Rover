<?php

namespace App\Http\Services\CheckOut;


use App\Http\Helpers\ReferenceNumberHelper;
use App\Http\Helpers\PaymentHelper;
use Xendit\Xendit;

class CheckOutService
{

  public function __construct()
  {
    Xendit::setApiKey(env('XENDIT_API_KEY'));
  }

  public static function createInvoice($amount, $success_redirect_url, $failure_redirect_url, $payment_method, $checked_in, $checked_out, $room_name)
  {
    $reference_number = ReferenceNumberHelper::generateRefNumber();
    $description = PaymentHelper::description($amount, $payment_method, $checked_in, $checked_out, $room_name);

    $params =
      [
        'external_id' => $reference_number,
        'description' => $description,
        'amount' => $amount,
        'invoice_duration' => 172800,
        'currency' => 'PHP',
        'reminder_time' => 1,
        'success_redirect_url' => $success_redirect_url,
        'failure_redirect_url' => $failure_redirect_url
      ];

    try {
      $response = \Xendit\Invoice::create($params);
    } catch (\Throwable $e) {
      $response['message'] = $e->getMessage();
    }

    logger($response);
    return $response;
  }
}
