<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['roleSynced' => '$refresh'];

    public function render()
    {
        return view('livewire.users.index', [
            'users' => User::paginate(10),
        ]);
    }
}
