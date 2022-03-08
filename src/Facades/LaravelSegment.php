<?php

namespace BinarCode\LaravelSegment\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BinarCode\LaravelSegment\LaravelSegment
 */
class LaravelSegment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-segment';
    }
}
