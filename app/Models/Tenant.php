<?php

namespace App\Models;

use App\Jobs\SeedTenantDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Spatie\Multitenancy\Models\Tenant as ModelsTenant;

class Tenant extends ModelsTenant
{
    protected $fillable = [
        'name',
        'domain',
        'database',
        'organization_id',
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public static function booted()
    {
        static::created(fn (Tenant $model) => SeedTenantDatabase::dispatch($model));
        static::deleted(fn (Tenant $model) => $model->dropDatabase());
    }

    public function dropDatabase()
    {
        DB::connection('tenant')
            ->statement("DROP DATABASE {$this->getDatabaseName()}");
    }
}
