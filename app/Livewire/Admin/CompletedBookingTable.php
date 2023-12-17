<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class CompletedBookingTable extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $completed_bookings = Booking::with(['user','room'])->where('status','Completed');
        
        if(!empty($this->search))
        {
            $completed_bookings->where(function($query){
                $query->orWhereHas('user', function($userQuery)
                {
                    $userQuery->where('name','LIKE','%'.$this->search.'%');
                })->orWhereHas('room', function($roomQuery){
                    $roomQuery->where('name','LIKE','%'.$this->search.'%');
                });
           });
        }
        $completed_bookings =  $completed_bookings->orderByDesc('id')->paginate(5);

        return view('livewire.admin.completed-booking-table',compact('completed_bookings'));
    }
}
