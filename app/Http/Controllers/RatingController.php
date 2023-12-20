<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Rating\StoreRatingRequest;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function store(StoreRatingRequest $request)
    {
        
        DB::beginTransaction();

        try {

            Rating::create([
                'booking_id' => $request->booking_id,
                'user_id' => $request->user_id,
                'room_id' => $request->room_id,
                'rating' => $request->rating,
                'comment' => $request->comment ?? '',
                'rating_date' => date('Y-m-d h:i:s')
            ]);

            DB::commit();

            return redirect()->route('booking.index')->with('success', 'Room Rated Successfully');
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->route('booking.index')->with('error', 'There was an Error');
        }
    }
}
