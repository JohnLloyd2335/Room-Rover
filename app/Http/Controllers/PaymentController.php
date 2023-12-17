<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Http\Helpers\PaymentHelper;
use App\Http\Helpers\ReferenceNumberHelper;
use App\Http\Services\CheckOut\CheckOutService;
use Exception;
use Xendit\Xendit;

class PaymentController extends Controller
{
    public function __construct()
    {
        Xendit::setApiKey(env('XENDIT_API_KEY'));
    }

    public function payEWallet(Request $request)
    {
        DB::beginTransaction();
        try {
            $booking = Booking::findOrFail($request->booking_id);
            $success_redirect_url = route('booking.index');
            $failure_redirect_url = route('booking.index');
            $payment_method = "E-Wallet";
            $amount = $booking->amount;
            $checked_in = $booking->checked_in;
            $checked_out = $booking->checked_out;
            $room_name = $booking->room->name;

            $reference_number = ReferenceNumberHelper::generateRefNumber();
            $description = PaymentHelper::description($amount, $payment_method, $checked_in, $checked_out, $room_name);

            Payment::create([
                'booking_id' => $request->booking_id,
                'payment_method' => $payment_method,
                'account_holder' => auth()->user()->name,
                'e-wallet_type' => 'GCash', 
                'reference_number' => $reference_number,
                'amount' => $amount,
                'description' => $description,
                'payment_date' => date('Y-m-d h:i:s')
            ]);

            $booking->update([
                'is_paid' => true 
            ]);

            DB::commit();

            $invoice = CheckOutService::createInvoice($amount, $success_redirect_url, $failure_redirect_url, $payment_method, $checked_in, $checked_out, $booking->room->name);


            if (!isset($invoice['invoice_url'])) {
             
                return redirect()->route('booking.index')->with('error', 'There was an error processing your payment.');
            }

            return redirect($invoice['invoice_url']);
        } catch (Exception $ex) {
            DB::rollBack();

            return redirect()->route('booking.index')->with('error', 'There was an error processing your payment.');
        }
    }

    public function payCreditCard(Request $request)
    {
        DB::beginTransaction();
        try {
            $booking = Booking::findOrFail($request->booking_id);
            $success_redirect_url = route('booking.index');
            $failure_redirect_url = route('booking.index');
            $payment_method = "Credit Card";
            $amount = $booking->amount;
            $checked_in = $booking->checked_in;
            $checked_out = $booking->checked_out;
            $room_name = $booking->room->name;

            $reference_number = ReferenceNumberHelper::generateRefNumber();
            $description = PaymentHelper::description($amount, $payment_method, $checked_in, $checked_out, $room_name);

            Payment::create([
                'booking_id' => $request->booking_id,
                'payment_method' => $payment_method,
                'account_holder' => auth()->user()->name,
                'credit_card_type' => 'Visa', 
                'reference_number' => $reference_number,
                'amount' => $amount,
                'description' => $description,
                'payment_date' => date('Y-m-d h:i:s')
            ]);

            $booking->update([
                'is_paid' => true 
            ]);

            DB::commit();

            $invoice = CheckOutService::createInvoice($amount, $success_redirect_url, $failure_redirect_url, $payment_method, $checked_in, $checked_out, $booking->room->name);


            if (!isset($invoice['invoice_url'])) {
             
                return redirect()->route('booking.index')->with('error', 'There was an error processing your payment.');
            }

            return redirect($invoice['invoice_url']);
        } catch (Exception $ex) {
            DB::rollBack();

            return redirect()->route('booking.index')->with('error', 'There was an error processing your payment.');
        }
    }
}
