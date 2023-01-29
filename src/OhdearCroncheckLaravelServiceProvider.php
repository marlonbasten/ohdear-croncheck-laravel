<?php

namespace Marlonbasten\OhdearCroncheckLaravel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Marlonbasten\OhdearCroncheckLaravel\Commands\OhdearCroncheckLaravelCommand;

class OhdearCroncheckLaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('ohdear-croncheck-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_ohdear-croncheck-laravel_table')
            ->hasCommand(OhdearCroncheckLaravelCommand::class);
    }
}
