<?php

namespace App\Http\Livewire\RolesAndPermissions;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'roleAdded' => '$refresh',
        'roleDeleted' => '$refresh',
        'permissionToggled' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.roles-and-permissions.index', [
            'roles' => Role::with('permissions')->where('name', '!=', 'Super Admin')->get(),
            'permissions' => Permission::all(),
        ]);
    }
}
