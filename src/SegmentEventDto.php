<?php

namespace BinarCode\LaravelSegment;

class SegmentEventDto
{
    public function __construct(
        public string $name,
        public ?string $userId = null,
        public ?string $actor = null,
        public ?array $meta = [],
        public ?string $targetModels = null,
        public ?int $target = null,
        public ?array $headers = []
    ) {
    }
}
