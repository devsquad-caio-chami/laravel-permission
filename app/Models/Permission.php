<?php

namespace App\Models;
use Spatie\Multitenancy\Models\Concerns\UsesLandlordConnection;
use Spatie\Permission\Models\Permission as SpatieRole;


class Permission extends SpatieRole
{
    use UsesLandlordConnection;
}
