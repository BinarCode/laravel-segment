<?php

namespace BinarCode\LaravelSegment;

use BinarCode\LaravelSegment\Commands\LaravelSegmentCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelSegmentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-segment')
            ->hasConfigFile()
            ->hasMigration('create_laravel_segment_table')
            ->hasCommand(LaravelSegmentCommand::class);
    }

    public function packageRegistered(): void
    {
        $this->app->bind(\BinarCode\LaravelSegment\Facades\LaravelSegment::getFacadeAccessor(), function ($app) {
            return new LaravelSegmentManager();
        });
    }
}
