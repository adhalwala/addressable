<?php

namespace Aecor\Address\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Aecor\Address\AddressServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        // parent::setUp();

        // Factory::guessFactoryNamesUsing(
        //     fn (string $modelName) => 'Aecor\\Address\\Database\\Factories\\'.class_basename($modelName).'Factory'
        // );
    }

    protected function getPackageProviders($app)
    {
        // return [
        //     AddressServiceProvider::class,
        // ];
    }

    public function getEnvironmentSetUp($app)
    {
        // $app['config']->set('database.default', 'sqlite');
        // $app['config']->set('database.connections.sqlite', [
        //     'driver' => 'sqlite',
        //     'database' => ':memory:',
        //     'prefix' => '',
        // ]);

        /*
        include_once __DIR__.'/../database/migrations/create_addressable_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
