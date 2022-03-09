<?php

namespace BinarCode\LaravelSegment\Commands;

use Illuminate\Console\Command;

class LaravelSegmentCommand extends Command
{
    public $signature = 'segment:check';

    public $description = 'Check the connection.';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
