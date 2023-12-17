<?php

namespace App\Livewire\Admin;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;


class TransactionTable extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $transactions = Payment::with('booking');
        
        if(!empty($this->search))
        {
            $transactions->where(function($query){
                $query->orWhereHas('booking', function($subQuery){
                    $subQuery->whereHas('room', function($roomQuery){
                        $roomQuery->where('name','like','%'.$this->search.'%');
                    })->orWhereHas('user', function($userQuery) {
                        $userQuery->where('name','like','%'.$this->search.'%');
                    });
                });
           });
        }
        $transactions =  $transactions->orderByDesc('id')->paginate(5);
        return view('livewire.admin.transaction-table', compact('transactions'));
    }
}
