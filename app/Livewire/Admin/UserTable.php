<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    public $search;

    use WithPagination;

    public function render()
    {
        $users = User::whereHas('userType', function($query){
            $query->whereNot('role_name', 'admin');
        });

        if(!empty($this->search))
        {
            $users->where('name','like','%'.$this->search.'%');
        }

        $users = $users->paginate(5);

        return view('livewire.admin.user-table',compact('users'));
    }
}
