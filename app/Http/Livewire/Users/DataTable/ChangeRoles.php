<?php

namespace App\Http\Livewire\Users\DataTable;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;
use Spatie\Multitenancy\Models\Tenant;

class ChangeRoles extends Component
{
    public int $userId;

    public $roleNames;

    public bool $editing = false;

    public $tenants;

    public $team_id;

    protected $rules = [
        'team_id.*' => 'nullable',
        'roleNames.*' => 'required|exists:roles,name',
    ];

    public function mount(string $roles)
    {
        $this->tenants = Tenant::all();
        $this->roleNames = Str::of($roles)->explode(',')->map(fn ($role) => Str::of($role)->trim());
    }

    public function getRoleOptionsProperty()
    {
        return Role::pluck('name');
    }

    public function save()
    {
        $user = User::find($this->userId);

        collect($this->team_id)->each(function ($item, $key) use ($user) {
            setPermissionsTeamId($item);

            $user->syncRoles($this->roleNames);
        });

        setPermissionsTeamId(Tenant::current()->id);

        $this->emit('roleSynced');
    }

    public function render()
    {
        return view('livewire.users.data-table.change-roles');
    }
}
