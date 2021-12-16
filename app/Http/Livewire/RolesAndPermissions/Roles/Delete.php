<?php

namespace App\Http\Livewire\RolesAndPermissions\Roles;

use App\Models\Role;
use Livewire\Component;

class Delete extends Component
{
    public bool $confirmingDelete = false;

    public Role $role;

    public function destroy()
    {
        $this->role->delete();

        $this->emitUp('roleDeleted');
    }

    public function render()
    {
        return view('livewire.roles-and-permissions.roles.delete');
    }
}
