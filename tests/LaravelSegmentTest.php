<?php

use BinarCode\LaravelSegment\Dto\SegmentPayload;
use BinarCode\LaravelSegment\Facades\LaravelSegment;
use function PHPUnit\Framework\assertInstanceOf;

it('can send instantiate payload', function () {
    assertInstanceOf(
        SegmentPayload::class,
        LaravelSegment::track('click')->options([
            'foo' => 'bar',
        ])
    );

    assertInstanceOf(
        SegmentPayload::class,
        segment('click'),
    );
});

it('can send to segment', function () {
});
