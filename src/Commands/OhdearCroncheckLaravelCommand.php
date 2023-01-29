<?php

namespace Marlonbasten\OhdearCroncheckLaravel\Commands;

use Illuminate\Console\Command;

class OhdearCroncheckLaravelCommand extends Command
{
    public $signature = 'ohdear-croncheck-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
