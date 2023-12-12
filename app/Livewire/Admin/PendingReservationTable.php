<?php

namespace App\Livewire\Admin;

use App\Models\Reservation;
use Livewire\Component;
use Livewire\WithPagination;

class PendingReservationTable extends Component
{

    use WithPagination;

    public $search; 

    public function render()
    {
        $pending_reservations = Reservation::with(['user','room'])->where('status','Pending');
        
        if(!empty($this->search))
        {
            $pending_reservations->whereHas('user', function($query){
                $query->where('name','like','%'.$this->search.'%');
            })->orWhereHas('room', function($query){
                $query->where('name','like','%'.$this->search.'%');
            });
        }
    
        $pending_reservations = $pending_reservations->orderByDesc('id')->paginate(10);

        return view('livewire.admin.pending-reservation-table', compact('pending_reservations'));
    }
}
