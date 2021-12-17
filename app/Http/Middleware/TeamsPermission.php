<?php

namespace App\Http\Middleware;

use App\Models\Tenant;

class TeamsPermission
{
    public function handle($request, \Closure $next)
    {
        $currentTenant = Tenant::current();

        if ($currentTenant) {
            app(\Spatie\Permission\PermissionRegistrar::class)->setPermissionsTeamId($currentTenant->id);
        }

        return $next($request);
    }
}
