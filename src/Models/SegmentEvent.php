<?php

namespace BinarCode\LaravelSegment\Models;

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

    public static function createFromName(string $name): self
    {
        return tap(new static([
            'name' => $name,
        ]))->save();
    }

    public function toSegment(): array
    {
        return array_merge([
            'event' => $this->name,
            'properties' => $this->meta,
            'anonymousId' => $this->actor,
        ], ($this->target ? ['userId' => $this->target] : []));
    }
}
