<?php

namespace Marlonbasten\OhdearCroncheckLaravel\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Marlonbasten\OhdearCroncheckLaravel\OhdearCroncheckLaravelServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Marlonbasten\\OhdearCroncheckLaravel\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            OhdearCroncheckLaravelServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_ohdear-croncheck-laravel_table.php.stub';
        $migration->up();
        */
    }
}
