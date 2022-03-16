<?php

namespace BinarCode\LaravelSegment\Facades;

use BinarCode\LaravelSegment\SegmentEventDto;
use Illuminate\Support\Facades\Facade;

/**
 * @see \BinarCode\LaravelSegment\LaravelSegment
 * @method static void trackEvent(SegmentEventDto $event)
 * @method static void alias(string $previousId, string $userId)
 */
class LaravelSegment extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'laravel-segment';
    }
}
