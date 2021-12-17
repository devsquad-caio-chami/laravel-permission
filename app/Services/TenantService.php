<?php

namespace App\Services;

use App\Models\Tenant;
use Illuminate\Support\Str;

class TenantService
{
    public function create(
        string $name,
        ?int $organizationId = null,
        ?string $database = null
    ): Tenant {
        $database ??= Str::of('tenant_')->append(Str::random())->lower();

        $name = Str::slug($name);

        return Tenant::create([
            'name' => $name,
            'domain' => Str::of(config('app.url'))->prepend($name . '.')->replace('http://', ''),
            'database' => $database,
            'organization_id' => $organizationId,
        ]);
    }
}
