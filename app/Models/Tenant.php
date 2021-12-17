<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Artisan;
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
        static::created(fn (Tenant $model) => $model->createDatabase());
        static::deleted(fn (Tenant $model) => $model->dropDatabase());
    }

    public function createDatabase()
    {
        DB::connection('tenant')->statement("CREATE DATABASE {$this->getDatabaseName()}");

        Artisan::call('tenants:artisan', [
            'artisanCommand' => 'migrate --database=tenant --seed',
            '--tenant' => $this->id,
        ]);
    }

    public function dropDatabase()
    {
        DB::connection('tenant')->statement("DROP DATABASE {$this->getDatabaseName()}");
    }
}
