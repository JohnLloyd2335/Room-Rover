<?php

namespace App\Livewire\Customer;

use App\Models\Rating;
use Livewire\Component;

class Review extends Component
{

    public $room_id;

    public function render()
    {
        $ratings = Rating::where('room_id', $this->room_id)->orderByDesc('rating_date')->paginate(3);

        return view('livewire.customer.review', compact('ratings'));
    }
}
