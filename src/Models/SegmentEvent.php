<?php

namespace BinarCode\LaravelSegment\Models;

use BinarCode\LaravelSegment\Facades\LaravelSegment;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use BinarCode\LaravelSegment\SegmentEventDto;

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

    public static function makeModel(SegmentEventDto $eventDto): self
    {
        return (new static)::create([
            'name' => $eventDto->name,
            'meta' => $eventDto->meta,
            'actor' => $eventDto->actor,
            'target' => $eventDto->target,
            'target_models' => $eventDto->targetModels,
        ]);
    }

    public function getTrackPayload(): array
    {
        return array_merge(
            ['event' => $this->name, 'properties' => $this->meta],
            $this->getIdentification()
        );
    }

    public function getIdentification(): array
    {
        return array_merge(
            ['anonymousId' => $this->actor],
            $this->target ? ['userId' => $this->target] : []
        );
    }
}
