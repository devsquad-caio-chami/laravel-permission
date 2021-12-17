<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesLandlordConnection;

class Organization extends Model
{
    use HasFactory;
    use UsesLandlordConnection;

    public function tenants(): HasMany
    {
        return $this->hasMany(Tenant::class);
    }
}
