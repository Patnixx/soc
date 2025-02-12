<?php

namespace App\Console\Commands;

use App\Models\Message;
use Illuminate\Console\Command;

class RemoveDeletedMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-deleted-messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $deleted = Message::where('is_deleted', true)->delete();
        $this->info("Deleted {$deleted} expired records.");
    }
}
