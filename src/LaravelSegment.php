<?php

namespace BinarCode\LaravelSegment;

use BinarCode\LaravelSegment\Models\SegmentEvent;
use BinarCode\LaravelSegment\SegmentEventDto;
use JetBrains\PhpStorm\NoReturn;
use Segment\Segment;

class LaravelSegment
{
    public function __construct()
    {
        Segment::init(config('segment.key'));
    }

    #[NoReturn]
    public function trackEvent(SegmentEventDto $segmentEventDto): void
    {
        $segmentEvent = SegmentEvent::makeModel($segmentEventDto);
        
        Segment::track($segmentEvent->getTrackPayload());
    }
}
