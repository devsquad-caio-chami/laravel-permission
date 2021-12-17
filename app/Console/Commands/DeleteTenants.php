<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;

class DeleteTenants extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete tenants';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
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
        $tenants = Tenant::all()->pluck('name')->all();

        $names = $this->choice(
            'Which tenants you want to remove?',
            $tenants,
            multiple: true
        );

        $this->info('Removing tenants...');

        $tenants = Tenant::whereIn('name', $names)
            ->get()
            ->each
            ->delete();

        $this->info($tenants->count() . ' tenants removed successfully');

        return 0;
    }
}
