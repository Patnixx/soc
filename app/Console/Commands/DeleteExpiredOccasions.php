<?php

namespace App\Console\Commands;

use App\Models\Occasion;
use Illuminate\Console\Command;

class DeleteExpiredOccasions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-occasions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired events';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $deleted = Occasion::where('start', '<', now())->delete();
        $this->info("Deleted {$deleted} expired records.");
    }
}
