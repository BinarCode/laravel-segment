<?php

return [
    /**
     * The queue name where the segment events will be dispatched.
     */
    'queue' => env('SEGMENT_QUEUE', env('QUEUE_CONNECTION', 'sync')),

    /**
     * Segment API key [see: https://segment.com/docs/connections/sources/catalog/libraries/server/php/#identify].
     */
    'key' => env('SEGMENT_KEY'),
];
