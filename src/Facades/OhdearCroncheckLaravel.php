<?php

namespace Marlonbasten\OhdearCroncheckLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Marlonbasten\OhdearCroncheckLaravel\OhdearCroncheckLaravel
 */
class OhdearCroncheckLaravel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Marlonbasten\OhdearCroncheckLaravel\OhdearCroncheckLaravel::class;
    }
}
