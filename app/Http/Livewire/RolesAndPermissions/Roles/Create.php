<?php

namespace App\Http\Livewire\RolesAndPermissions\Roles;

use App\Models\Role;
use Livewire\Component;

class Create extends Component
{
    public bool $open = false;

    public string $name = '';

    protected $rules = [
        'name' => 'required|string|unique:roles',
    ];

    public function save()
    {
        $this->validate();

        Role::create([
            'name' => $this->name,
            'guard_name' => 'web',
        ]);

        $this->reset();

        $this->emit('roleAdded');
    }

    public function render()
    {
        return view('livewire.roles-and-permissions.roles.create');
    }
}
