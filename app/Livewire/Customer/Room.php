<?php

namespace App\Livewire\Customer;

use App\Models\Room as ModelsRoom;
use App\Models\RoomCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Room extends Component
{
    use WithPagination;

    public $search;
    public $min;
    public $max;
  

    public function render()
    {
        $rooms = ModelsRoom::with('category');
       

        if (!empty($this->search)) {
            $rooms->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                     ->orWhereHas('category', function ($subQuery) {
                         $subQuery->where('name', 'like', '%' . $this->search . '%');
                     });
            });
        }

        if (!empty($this->min) && !empty($this->max)) {
            $rooms->whereHas('category', function ($query) {
                $query->whereBetween('price', [$this->min, $this->max]);
            });
        }

        // $room_categories = RoomCategory::select('id', 'name')->withCount('room')->get();

        $rooms = $rooms->paginate(4);

        return view('livewire.customer.room', compact('rooms'));
    }
}
