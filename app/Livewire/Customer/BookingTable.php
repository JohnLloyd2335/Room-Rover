<?php

namespace App\Livewire\Customer;

use App\Models\Booking;
use Livewire\Component;

class BookingTable extends Component
{

    public $search;

    public function render()
    {

        $bookings = Booking::with(['user','room'])->where('user_id',auth()->user()->id);
        
        if(!empty($this->search))
        {
            $bookings->where(function($query){
                $query->orWhereHas('user', function($userQuery)
                {
                    $userQuery->where('name','LIKE','%'.$this->search.'%');
                })->orWhereHas('room', function($roomQuery){
                    $roomQuery->where('name','LIKE','%'.$this->search.'%');
                });
           });
        }
        $bookings =  $bookings->orderByDesc('id')->paginate(5);

        return view('livewire.customer.booking-table', compact('bookings'));
    }
}
