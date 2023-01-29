<?php

namespace Marlonbasten\OhdearCroncheckLaravel\Listeners;

use Illuminate\Console\Events\CommandStarting;
use Marlonbasten\OhdearCroncheckLaravel\Facades\OhDearCron;

/**
 * @interal
 */
class OhDearCommandStartListener
{
    public function handle(CommandStarting $event): void
    {
        OhDearCron::setStartedTime($event->command, now());
    }
}
