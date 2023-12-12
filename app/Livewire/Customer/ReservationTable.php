<?php

namespace App\Livewire\Customer;

use App\Models\Reservation;
use Livewire\Component;
use Livewire\WithPagination;

class ReservationTable extends Component
{
    use WithPagination;

    public $search; 

    public function render()
    {
        $reservations = Reservation::with(['user','room'])->where('user_id',auth()->user()->id);
        
        if(!empty($this->search))
        {
            $reservations->whereHas('user', function($query){
                $query->where('name','like','%'.$this->search.'%');
            })->orWhereHas('room', function($query){
                $query->where('name','like','%'.$this->search.'%');
            });
        }
    
        $reservations = $reservations->orderByDesc('id')->paginate(10);
        return view('livewire.customer.reservation-table', compact('reservations'));
    }
}
