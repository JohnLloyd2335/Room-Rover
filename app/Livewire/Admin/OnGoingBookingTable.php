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
       
        $on_going_bookings = Booking::with(['user','room'])->where('status','On-Going');
        
        if(!empty($this->search))
        {
            $on_going_bookings->where(function($query){
                $query->orWhereHas('user', function($userQuery)
                {
                    $userQuery->where('name','LIKE','%'.$this->search.'%');
                })->orWhereHas('room', function($roomQuery){
                    $roomQuery->where('name','LIKE','%'.$this->search.'%');
                });
           });
        }
        $on_going_bookings =  $on_going_bookings->orderByDesc('id')->paginate(5);

        return view('livewire.admin.on-going-booking-table',compact('on_going_bookings'));
    }
}
