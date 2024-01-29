<?php

namespace IbrahimBougaoua\LaravelVfdplus\Tests;

use IbrahimBougaoua\LaravelVfdplus\LaravelVfdplusServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'IbrahimBougaoua\\LaravelVfdplus\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelVfdplusServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-vfdplus_table.php.stub';
        $migration->up();
        */
    }
}
