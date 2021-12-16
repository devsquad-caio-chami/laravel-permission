<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Tenant;

class TeamsPermission
{
    public function handle($request, \Closure $next){
        if(!empty(auth()->user())){
            // session value set on login
            app(\Spatie\Permission\PermissionRegistrar::class)->setPermissionsTeamId(Tenant::current()->id);
        }
        // other custom ways to get team_id
        /*if(!empty(auth('api')->user())){
            // `getTeamIdFromToken()` example of custom method for getting the set team_id
            app(\Spatie\Permission\PermissionRegistrar::class)->setPermissionsTeamId(auth('api')->user()->getTeamIdFromToken());
        }*/

        return $next($request);
    }
}
