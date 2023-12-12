<?php

namespace App\Livewire\Admin;

use App\Models\Reservation;
use Livewire\Component;
use Livewire\WithPagination;

class RejectedReservationTable extends Component
{
    use WithPagination;

    public $search; 

    public function render()
    {
        $rejected_reservations = Reservation::with(['user','room'])->where('status','Rejected');
        
        if(!empty($this->search))
        {
            $rejected_reservations->whereHas('user', function($query){
                $query->where('name','like','%'.$this->search.'%');
            })->orWhereHas('room', function($query){
                $query->where('name','like','%'.$this->search.'%');
            });
        }
    
        $rejected_reservations = $rejected_reservations->orderByDesc('id')->paginate(10);


        return view('livewire.admin.rejected-reservation-table',compact('rejected_reservations'));
    }
}
