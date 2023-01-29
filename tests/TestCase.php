<?php

namespace Marlonbasten\OhdearCroncheckLaravel\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Marlonbasten\OhdearCroncheckLaravel\OhdearCroncheckLaravelServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

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
