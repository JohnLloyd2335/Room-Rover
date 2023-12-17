<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\PaymentHelper;
use App\Http\Helpers\ReferenceNumberHelper;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function payCash(Request $request)
    {

        DB::beginTransaction();

        $booking = Booking::with('room')->select('checked_in', 'checked_out')->where('id', $request->booking_id)->first();
        
        $reference_number = ReferenceNumberHelper::generateRefNumber();
        $description = PaymentHelper::description($request->amount, 'cash', $booking->checked_in, $booking->checked_out,$request->room_name);

        try {
            
            $payment = Payment::create([
                'booking_id' => $request->booking_id,
                'reference_number' => $reference_number,
                'payment_method' => "Cash",
                'amount' => $request->amount,
                'description' => $description,
                'payment_date' => date('Y-m-d h:i:s')
            ]);

            $payment->booking->update([
                'is_paid' => true
            ]);

            DB::commit();

            return redirect()->route('admin.booking.on-going.index')->with('success', 'Booking Successfully Paid');
        } catch (\Exception $th) {

            return redirect()->route('admin.booking.on-going.index')->with('error', 'There was an error');
        }
    }
}
