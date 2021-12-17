<?php

namespace App\Http\Livewire\Tenants;

use App\Models\Tenant;
use Livewire\Component;

class Delete extends Component
{
    public bool $confirmingDelete = false;

    public int $tenantId;

    public function destroy()
    {
        $tenant = Tenant::find($this->tenantId);

        $tenant->delete();

        $this->emitUp('tenantDeleted');
    }

    public function render()
    {
        return view('livewire.tenants.delete');
    }
}
