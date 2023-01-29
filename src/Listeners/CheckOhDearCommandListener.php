<?php

namespace Marlonbasten\OhdearCroncheckLaravel\Listeners;

use Carbon\Carbon;
use Illuminate\Console\Events\CommandFinished;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Marlonbasten\OhdearCroncheckLaravel\Facades\OhDearCron;

/**
 * @interal
 */
class CheckOhDearCommandListener
{
    public function handle(CommandFinished $event): void
    {
        $command = OhDearCron::getCommand($event->command);
        if (! $command) {
            return;
        }

        $runtime = null;
        if ($command['started'] instanceof Carbon) {
            $runtime = $command['started']->diffInSeconds(now());
        }

        $data = collect([
            'exit_code' => $event->exitCode,
            'runtime' => $runtime,
        ])->reject(fn ($value) => $value === null)->toArray();

        try {
            Http::post(config('ohdear-croncheck-laravel.ohdear_url').'/'.$command['id'], $data)->throw();
        } catch (RequestException $e) {
            Log::error('Could not send cronjob request: '.$e->getMessage());
        }
    }
}
