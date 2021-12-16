<?php

namespace App\Http\Livewire\RolesAndPermissions;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;

class Toggle extends Component
{
    public Role $role;

    public Permission $permission;

    public function toggle()
    {
        if ($this->role->hasPermissionTo($this->permission)) {
            $this->role->revokePermissionTo($this->permission);
        } else {
            $this->role->givePermissionTo($this->permission);
        }

        $this->emit('permissionToggled');
    }

    public function render()
    {
        return view('livewire.roles-and-permissions.toggle');
    }
}
