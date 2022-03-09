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

    #[NoReturn] public function trackEvent(SegmentEvent $event): void
    {
        // segment_session - stores uuid + IP
        // segment_events -> uuid (from the session) + event name

        Segment::track([
//            'userId' => $event->actor,
//            'annonymousId' => $event->actor,
            'messageId' => $event->session_uuid,
        ]);
    }
}
