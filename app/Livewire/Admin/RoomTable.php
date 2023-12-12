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

    public $min;

    public $max;

    public $filter_category = [];


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

        if (!empty($this->min) && !empty($this->max)) {
            $rooms->whereHas('category', function ($query) {
                $query->whereBetween('price', [$this->min, $this->max]);
            });
        }

        if (!empty($this->filter_category)) {
            $rooms->whereHas('category', function ($query) {
                $query->whereIn('id', $this->filter_category);
            });
        }
    
        
        $rooms = $rooms->paginate(5);
        
        return view('livewire.admin.room-table', compact('rooms'));
        
    }

    public function filterPrice($query)
    {
        $query->whereBetween('price',['min','max']);
    }
}
