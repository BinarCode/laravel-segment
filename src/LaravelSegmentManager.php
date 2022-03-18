<?php

namespace BinarCode\LaravelSegment;

use BinarCode\LaravelSegment\Dto\SegmentPayload;
use Segment\Segment;

class LaravelSegmentManager
{
    public function __construct()
    {
        Segment::init(config('segment.key'));
    }

    public function track(string|array|SegmentPayload $payload, array $options = []): SegmentPayload
    {
        if (is_string($payload)) {
            return new SegmentPayload(
                name: $payload,
                options: $options,
            );
        }

        if ($payload instanceof SegmentPayload) {
            return $payload;
        }

        return new SegmentPayload(
            name: 'empty',
        );
    }

    public function alias(string $previousId, string $userId): void
    {
        Segment::alias([
            'previousId' => $previousId,
            'userId' => $userId,
        ]);
    }
}
