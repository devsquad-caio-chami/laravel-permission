<?php

namespace App\Services;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\PermissionRegistrar;

class TenantService
{
    public function __construct(protected PermissionRegistrar $registrar)
    {
    }

    public function create(
        string $name,
        ?int $organizationId = null,
        ?string $database = null
    ): Tenant {
        $database ??= Str::of('tenant_')->append(Str::random())->lower();

        $name = Str::slug($name);

        $tenant = Tenant::create([
            'name' => $name,
            'domain' => Str::of(config('app.url'))->prepend($name . '.')->replace('http://', ''),
            'database' => $database,
            'organization_id' => $organizationId,
        ]);

        $this->registrar->setPermissionsTeamId($tenant->id);

        $superAdmin = User::whereEmail('super-admin@devsquad.com')->first();

        $admin = User::whereEmail('team@devsquad.com')->first();

        $writer = User::whereEmail('writer@devsquad.com')->first();

        $superAdmin->assignRole('Super Admin');

        $admin->assignRole('Admin');

        $writer->assignRole('Writer');

        return $tenant;
    }
}
