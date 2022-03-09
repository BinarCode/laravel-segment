<?php

namespace BinarCode\LaravelSegment\Models;

use BinarCode\LaravelSegment\Facades\LaravelSegment;
use BinarCode\LaravelSegment\SegmentEventDto;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $type
 * @property string $description
 * @property string $target
 * @property string $actor
 * @property array $target_models
 * @property array $headers
 * @property array $meta
 * @property CarbonInterface $segment_persisted_at
 */
class SegmentEvent extends Model
{
    use WithUuid;

    protected $table = 'segment_events';

    protected $guarded = ['id'];

    protected $casts = [
        'meta' => 'json',
        'headers' => 'json',
        'target_models' => 'json',
        'segment_persisted_at' => 'datetime',
    ];

    public static function makeFromSegmentEventDto(SegmentEventDto $eventDto): self
    {
        return new static([
            'name' => $eventDto->name,
            'meta' => $eventDto->meta,
            'actor' => $eventDto->userId,
        ]);
    }

    public function callSegment(): void
    {
        LaravelSegment::trackEvent($this);
    }
}
