<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Spatie\Permission\PermissionRegistrar;

class TeamsPermission
{
    public function handle($request, \Closure $next)
    {
        $currentTenant = Tenant::current();

        if(!empty(auth()->user())){
            app(PermissionRegistrar::class)->setPermissionsTeamId($currentTenant->id);
        }
        return $next($request);
    }
}
