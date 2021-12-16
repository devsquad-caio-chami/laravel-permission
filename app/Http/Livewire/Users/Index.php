<?php

namespace App\Http\Livewire\Users;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.users.index');
    }
}
