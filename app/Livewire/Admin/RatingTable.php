<?php

namespace App\Livewire\Admin;

use App\Models\Rating;
use Livewire\Component;
use Livewire\WithPagination;

class RatingTable extends Component
{
    public $search;

    use WithPagination;

    public function render()
    {
        $ratings = Rating::with('user');

        if(!empty($this->search))
        {
            $ratings->whereHas('user', function($query)
            {
                $query->where('name','like','%'.$this->search.'%');
            });
        }

        $ratings = $ratings->paginate(5);

        return view('livewire.admin.rating-table', compact('ratings'));
    }
}
