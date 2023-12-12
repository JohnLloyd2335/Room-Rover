<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\DateHelper;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    //Pending
    public function pending_index()
    {
        return view('admin.reservation.pending');
    }

    public function approveReservation(Reservation $reservation)
    {


        DB::beginTransaction();

        try {
            $reservation->update([
                'status' => 'Approved'
            ]);

            $price = (float)$reservation->room->category->price;

            $days_stayed = DateHelper::calculateDaysBetweenTwoDates($reservation->start_date, $reservation->end_date);

            // Ensure that $days_stayed is cast to int before multiplication
            $amount = $price * (int) $days_stayed;

            $checked_in = date('Y-m-d',strtotime($reservation->start_date));
            $checked_out = date('Y-m-d',strtotime($reservation->end_date));

            Booking::create([
                'reservation_id' => $reservation->id,
                'user_id' => auth()->user()->id,
                'room_id' => $reservation->room_id,
                'checked_in' => $checked_in,
                'checked_out' => $checked_out,
                'amount' => $amount
            ]);

            DB::commit();

            return redirect()->route('admin.reservation.pending.index')->with('success', 'Reservation Successfully Approved');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->route('admin.reservation.pending.index')->with('error', 'There was an Error');
        }
    }

    public function rejectReservation(Reservation $reservation)
    {
        DB::beginTransaction();

        try {
            
            $reservation->update([
                'status' => 'Rejected'
            ]);

            $reservation->room->update([
                'is_available' => '1'
            ]);

            DB::commit();

            return redirect()->route('admin.reservation.pending.index')->with('success', 'Reservation Successfully Rejected');

        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->route('admin.reservation.pending.index')->with('error', 'There was an Error');
        }
    }

    //Approved
    public function approved_index()
    {
        return view('admin.reservation.approved');
    }

    //Rejected
    public function rejected_index()
    {
        return view('admin.reservation.rejected');
    }

    //Pending
    public function cancelled_index()
    {
        return view('admin.reservation.cancelled');
    }
}
