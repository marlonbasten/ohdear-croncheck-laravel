<?php

namespace Marlonbasten\OhdearCroncheckLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \Marlonbasten\OhdearCroncheckLaravel\OhDearCron
 */
class OhDearCron extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Marlonbasten\OhdearCroncheckLaravel\OhDearCron::class;
    }
}
