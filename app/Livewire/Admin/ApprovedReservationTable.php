<?php

namespace App\Livewire\Admin;

use App\Models\Reservation;
use Livewire\Component;
use Livewire\WithPagination;

class ApprovedReservationTable extends Component
{
    use WithPagination;

    public $search; 

    public function render()
    {
        $approved_reservations = Reservation::with(['user','room'])->where('status','Approved');
        
        if(!empty($this->search))
        {
            $approved_reservations->whereHas('user', function($query){
                $query->where('name','like','%'.$this->search.'%');
            })->orWhereHas('room', function($query){
                $query->where('name','like','%'.$this->search.'%');
            });
        }
    
        $approved_reservations = $approved_reservations->orderByDesc('id')->paginate(10);

        
        return view('livewire.admin.approved-reservation-table',compact('approved_reservations'));
    }
}
