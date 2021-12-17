<?php

namespace App\Models;

use Spatie\Multitenancy\Models\Concerns\UsesLandlordConnection;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use UsesLandlordConnection;
}
