<?php

namespace IbrahimBougaoua\LaravelVfdplus;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use IbrahimBougaoua\LaravelVfdplus\Commands\LaravelVfdplusCommand;

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
