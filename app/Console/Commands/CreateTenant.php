<?php

namespace App\Console\Commands;

use App\Models\Organization;
use App\Models\User;
use App\Services\TenantService;
use Illuminate\Console\Command;
use Spatie\Permission\PermissionRegistrar;

class CreateTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new tenant';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(public TenantService $service)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Enter the tenant name');

        $organizations = Organization::all();

        $organization = $this->choice('Select organization', $organizations->pluck('name')->all());

        $organization = $organizations->firstWhere('name', $organization);

        try {
            $this->service->create($name, $organization->id);

            $this->info('Tenant created successfully');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }

        return 0;
    }
}
