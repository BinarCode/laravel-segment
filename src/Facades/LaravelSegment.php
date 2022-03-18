<?php

namespace BinarCode\LaravelSegment\Facades;

use BinarCode\LaravelSegment\Dto\SegmentPayload;
use Illuminate\Support\Facades\Facade;

/**
 * @see \BinarCode\LaravelSegment\LaravelSegmentManager
 * @method static void alias(string $previousId, string $userId)
 * @method static SegmentPayload track(string|array|SegmentPayload $payload, array $options = [])
 */
class LaravelSegment extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'laravel-segment';
    }
}
