<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $categories_count = RoomCategory::count();
        $room_count = Room::count();
        $user_count = User::whereHas('userType', function($query){
            $query->whereNot('role_name','admin');
        })->count();
        $reservation_count = Reservation::count();
        $booking_count = Booking::whereNot('status', 'Completed')->count();
        $monthly_income = Payment::whereYear('payment_date',now())->whereMonth('payment_date',now())->sum('amount');
        $yearly_income = Payment::whereYear('payment_date',now())->sum('amount');

        return view('admin.dashboard',compact('categories_count','room_count','user_count','reservation_count','booking_count','monthly_income','yearly_income'));
    }
}
