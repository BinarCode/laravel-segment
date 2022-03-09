<?php

namespace BinarCode\LaravelSegment;

class SegmentEventDto
{
    public function __construct(
        public string $name,
        public array $meta = [],
        public ?string $userId = null,
    ) {
    }
}
