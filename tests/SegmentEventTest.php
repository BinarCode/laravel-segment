<?php

use BinarCode\LaravelSegment\Models\SegmentEvent;
use BinarCode\LaravelSegment\SegmentEventDto;
use function Pest\Laravel\assertModelExists;

it('can store event', function () {
    $dto = new SegmentEventDto(
        name: 'Click',
        meta: [
            'foo' => 'bar',
        ],
        userId: 1,
    );

    $model = tap(SegmentEvent::makeFromSegmentEventDto($dto))->save();

    assertModelExists($model);
});

// post -> click, actor

it('can send event throught segment', function () {
    $dto = new SegmentEventDto(
        name: 'Click',
        userId: 1,
    );

    /** @var SegmentEvent $model */
    $model = tap(SegmentEvent::makeFromSegmentEventDto($dto))->save();

    $model->callSegment();
});
