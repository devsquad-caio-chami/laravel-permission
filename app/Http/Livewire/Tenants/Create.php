<?php

namespace App\Http\Livewire\Tenants;

use App\Models\Organization;
use App\Services\TenantService;
use Livewire\Component;

class Create extends Component
{
    public bool $open = false;

    public array $brand = [
        'name' => '',
        'organization_id' => null,
    ];

    protected $rules = [
        'brand.name' => 'required|string|max:100|unique:landlord.tenants,name',
        'brand.organization_id' => 'required|integer|max:100|exists:landlord.organizations,id',
    ];

    public function getOrganizationOptionsProperty()
    {
        return Organization::all()->pluck('name', 'id');
    }

    public function save(TenantService $service)
    {
        $this->validate();

        $service->create($this->brand['name'], $this->brand['organization_id']);

        $this->reset();

        $this->emit('tenantAdded');
    }

    public function render()
    {
        return view('livewire.tenants.create');
    }
}
