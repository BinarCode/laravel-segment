<?php

namespace BinarCode\LaravelSegment\Models;

use BinarCode\LaravelSegment\SegmentEventDto;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

/**
 * @property string $name
 * @property string $type
 * @property string $description
 * @property string $target
 * @property string $actor
 * @property string $fingerprint
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

    public function withFingerprint(string $fingerprint): self
    {
        $this->fingerprint = $fingerprint;

        return $this;
    }

    #[Pure]
    public function toSegment(): array
    {
        /*
         *
         * {
  "context": {
    "library": {
      "name": "analytics.js",
      "version": "2.11.1"
    },
    "page": {
      "path": "/academy/",
      "referrer": "",
      "search": "",
      "title": "Analytics Academy",
      "url": "https://segment.com/academy/"
    },
    "userAgent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36",
    "ip": "108.0.78.21"
  },
  "event": "Course Clicked",
  "integrations": {},
  "properties": {
    "title": "Intro to Analytics"
  },
  "receivedAt": "2015-12-12T19:11:01.266Z",
  "sentAt": "2015-12-12T19:11:01.169Z",
  "timestamp": "2015-12-12T19:11:01.249Z",
  "type": "track",
  "userId": "AiUGstSDIg",
  "anonymousId": "23adfd82-aa0f-45a7-a756-24f2a7a4c895",
  "messageId": "ajs-f8ca1e4de5024d9430b3928bd8ac6b96",
  "originalTimestamp": "2015-12-12T19:11:01.152Z"
}
         * */
        return [
            'event' => $this->name,
            'properties' => $this->meta,
            'anonymousId' => $this->fingerprint,
            'userId' => $this->actor,
        ];

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
