<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function ongoing_booking_index()
    {
        return view('admin.booking.on-going-index');
    }

    public function complete_booking(Booking $booking)
    {
        DB::beginTransaction();

        try {


            $booking->update([
                'status' => 'Completed'
            ]);

            $booking->room->update([
                'is_available' => true
            ]);

            DB::commit();

            return redirect()->route('admin.booking.on-going.index')->with('success', 'Booking Successfully Completed');
        } catch (\Exception $th) {

            DB::rollBack();

            return redirect()->route('admin.booking.on-going.index')->with('error', 'There was an Error');
        }
    }

    public function completed_booking_index()
    {
        return view('admin.booking.completed-index');
    }
}
