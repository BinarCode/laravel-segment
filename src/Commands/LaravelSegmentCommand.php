<?php

namespace BinarCode\LaravelSegment\Commands;

use Illuminate\Console\Command;

class LaravelSegmentCommand extends Command
{
    public $signature = 'laravel-segment';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
