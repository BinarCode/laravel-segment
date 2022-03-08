<?php

namespace BinarCode\LaravelSegment;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use BinarCode\LaravelSegment\Commands\LaravelSegmentCommand;

class LaravelSegmentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-segment')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-segment_table')
            ->hasCommand(LaravelSegmentCommand::class);
    }
}
