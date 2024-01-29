<?php

namespace IbrahimBougaoua\LaravelVfdplus;

use IbrahimBougaoua\LaravelVfdplus\Commands\LaravelVfdplusCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelVfdplusServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-vfdplus')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-vfdplus_table')
            ->hasCommand(LaravelVfdplusCommand::class);
    }
}
