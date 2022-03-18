<?php

namespace BinarCode\LaravelSegment\Dto;

use Illuminate\Support\Str;
use Segment\Segment;
use Spatie\DataTransferObject\DataTransferObject;

class SegmentPayload extends DataTransferObject
{
    public string $name;

    public ?string $actor = null;

    public bool $sendable = true;

    public bool $sent = false;

    public ?array $properties = [];

    public function toSegment(): array
    {
        return array_merge([
            'event' => $this->name,
            'properties' => $this->properties,
            'anonymousId' => $this->actor ?? Str::uuid()->__toString(),
        ], ($this->actor ? ['userId' => $this->actor] : []));
    }

    public function options(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function actor(string $actor): self
    {
        $this->actor = $actor;

        return $this;
    }

    public function ip(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function track(): bool
    {
        return $this->sent = Segment::track($this->toSegment());
    }

    public function __destruct()
    {
        if (! $this->sent) {
            $this->track();
        }
    }
}
