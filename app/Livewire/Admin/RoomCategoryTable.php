<?php

namespace App\Livewire\Admin;

use App\Models\RoomCategory;
use Livewire\Component;
use Livewire\WithPagination;

class RoomCategoryTable extends Component
{

    public $search;

    use WithPagination;

    public function render()
    {
        $categories = RoomCategory::query();

        if(!empty($this->search))
        {
            $categories->where('name','like','%'.$this->search.'%');
        }

        $categories = $categories->paginate(5);

        return view('livewire.admin.room-category-table',compact('categories'));
    }
}
