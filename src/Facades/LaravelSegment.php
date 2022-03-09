<?php

namespace BinarCode\LaravelSegment\Facades;

use BinarCode\LaravelSegment\Models\SegmentEvent;
use Illuminate\Support\Facades\Facade;

/**
 * @see \BinarCode\LaravelSegment\LaravelSegment
 * @method static void trackEvent(SegmentEvent $event)
 */
class LaravelSegment extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'laravel-segment';
    }
}
