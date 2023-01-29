<?php

namespace Marlonbasten\OhdearCroncheckLaravel;

use Illuminate\Console\Events\CommandFinished;
use Illuminate\Console\Events\CommandStarting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use Marlonbasten\OhdearCroncheckLaravel\Commands\OhdearCroncheckLaravelCommand;
use Marlonbasten\OhdearCroncheckLaravel\Listeners\CheckOhDearCommandListener;
use Marlonbasten\OhdearCroncheckLaravel\Listeners\OhDearCommandStartListener;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class OhdearCroncheckLaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('ohdear-croncheck-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_ohdear-croncheck-laravel_table')
            ->hasCommand(OhdearCroncheckLaravelCommand::class);
    }

    public function packageBooted(): void
    {
        if (
            (config('ohdear-croncheck-laravel.only_in_prod') === true && App::isProduction()) ||
            config('ohdear-croncheck-laravel.only_in_prod') === false
        ) {
            Event::listen(CommandStarting::class, [OhDearCommandStartListener::class, 'handle']);
            Event::listen(CommandFinished::class, [CheckOhDearCommandListener::class, 'handle']);
        }
    }
}
