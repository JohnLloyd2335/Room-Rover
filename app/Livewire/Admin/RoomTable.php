<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\RoomCategory;
use Livewire\Component;
use Livewire\WithPagination;

class RoomTable extends Component
{
    use WithPagination;

    public $search;


    public function render()
    {
        $rooms = Room::with('category');

        if (!empty($this->search)) {
            $rooms->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($subQuery) {
                        $subQuery->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }
        
        $rooms = $rooms->paginate(5);
        
        return view('livewire.admin.room-table', compact('rooms'));
        
    }
}
