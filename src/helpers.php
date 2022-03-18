<?php

use BinarCode\LaravelSegment\Dto\SegmentPayload;
use BinarCode\LaravelSegment\Facades\LaravelSegment;

if (!function_exists('segment')) {
    function segment(string|array|SegmentPayload $payload, array $options = []): SegmentPayload
    {
        return LaravelSegment::track($payload, $options);
    }
}
