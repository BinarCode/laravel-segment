<?php

namespace BinarCode\LaravelSegment;

use BinarCode\LaravelSegment\Models\SegmentEvent;
use JetBrains\PhpStorm\NoReturn;
use Segment\Segment;

class LaravelSegment
{
    public function __construct()
    {
        Segment::init(config('segment.key'));
    }

    #[NoReturn]
    public function trackEvent(SegmentEvent $event): void
    {
        Segment::track($event->toSegment());
    }
}
