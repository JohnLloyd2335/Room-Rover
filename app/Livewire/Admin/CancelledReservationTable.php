<?php

namespace App\Livewire\Admin;

use App\Models\Reservation;
use Livewire\Component;
use Livewire\WithPagination;

class CancelledReservationTable extends Component
{
    use WithPagination;

    public $search; 

    public function render()
    {
        $cancelled_reservations = Reservation::with(['user','room'])->where('status','Cancelled');
        
        if(!empty($this->search))
        {
            $cancelled_reservations->whereHas('user', function($query){
                $query->where('name','like','%'.$this->search.'%');
            })->orWhereHas('room', function($query){
                $query->where('name','like','%'.$this->search.'%');
            });
        }
    
        $cancelled_reservations = $cancelled_reservations->orderByDesc('id')->paginate(10);

        return view('livewire.admin.cancelled-reservation-table', compact('cancelled_reservations'));
    }
}
