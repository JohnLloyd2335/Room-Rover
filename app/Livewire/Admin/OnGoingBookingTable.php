<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use App\Models\Reservation;
use Livewire\Component;
use Livewire\WithPagination;

class OnGoingBookingTable extends Component
{
    use WithPagination;

    public $search; 

    public function render()
    {
       
        $on_going_bookings = Booking::where('status','On-Going')->orderByDesc('id')->paginate(5);

        return view('livewire.admin.on-going-booking-table',compact('on_going_bookings'));
    }
}
