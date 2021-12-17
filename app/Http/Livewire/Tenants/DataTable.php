<?php

namespace App\Http\Livewire\Tenants;

use App\Models\Tenant;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DataTable extends LivewireDatatable
{
    public $hideable = 'select';

    public $exportable = false;

    protected $listeners = [
        'tenantAdded' => '$refresh',
        'tenantDeleted' => '$refresh',
    ];

    public function builder()
    {
        return Tenant::query()->with(['organization', 'domains']);
    }

    public function columns()
    {
        return [

            NumberColumn::name('id')
                ->label('ID'),

            Column::name('name')
                ->label('Name'),

            Column::name('domain')->label('Domain'),

            Column::name('database')->label('Database'),

            Column::name('organization.name')->label('Organization'),

            Column::callback(
                ['id', 'name'],
                fn ($id) => view('livewire.tenants.data-table.table-actions', ['id' => $id])
            )->unsortable()

        ];
    }
}
