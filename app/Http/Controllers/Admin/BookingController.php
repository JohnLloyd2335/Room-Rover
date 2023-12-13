<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function ongoing_booking_index()
    {
        return view('admin.booking.on-going-index');
    }
}
