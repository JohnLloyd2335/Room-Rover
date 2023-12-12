<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreReservationRequest;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{

    public function index()
    {
        return view('reservation');
    }

    public function store(StoreReservationRequest $request)
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $validated = $request->validated($request->all());

        $start_date = date('Y-m-d', strtotime($request->start_date));
        $end_date =  date('Y-m-d', strtotime($request->end_date));

        if ($start_date > $end_date) {
            return redirect()->route('room.show', $request->room_id)->with('error', 'Start Date cannot be greater than End Date')->withInput();
        }

        DB::beginTransaction();

        try {

            $reservation = Reservation::create([
                'user_id' => auth()->user()->id,
                'room_id' => $request->room_id,
                'start_date' => $start_date,
                'end_date' => $end_date,
            ]);

            if ($reservation) {
                $room = Room::findOrFail($request->room_id);

                $room->update([
                    'is_available' => false
                ]);

                DB::commit();

                return redirect()->route('room.show', $request->room_id)->with('success', 'Room Successfully Reserved, Wait for Admin Updates');
            }
        } catch (\Exception $th) {

            DB::rollBack();

            return redirect()->route('room.show', $request->room_id)->with('error', 'There was an Error');
        }
    }


    public function cancel(Reservation $reservation)
    {

        DB::beginTransaction();

        try {

            $reservation->update([
                'status' => 'Cancelled'
            ]);

            $reservation->room->update([
                'is_available' => '1'
            ]);

            DB::commit();

            return redirect()->route('reservation.index')->with('success', 'Reservation Successfully Cancelled');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->route('reservation.index')->with('error', 'There was an Error');
        }
    }
}
