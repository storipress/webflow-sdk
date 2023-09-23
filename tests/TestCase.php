<?php

namespace Tests;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Storipress\Webflow\Webflow;

class TestCase extends BaseTestCase
{
    public Webflow $webflow;

    protected function setUp(): void
    {
        parent::setUp();

        $this->assertNotNull($this->app);

        $this->webflow = $this->app
            ->make(Webflow::class)
            ->setAccessToken(fake()->unique()->sha256());

        Http::preventStrayRequests();

        $data = require __DIR__ . '/Datasets.php';

        Http::fake($data);
    }

    /**
     * Override application aliases.
     *
     * @param  Application  $app
     * @return array<non-empty-string, class-string<Facade>>
     */
    protected function getPackageAliases($app): array
    {
        return [
            'Http' => Http::class,
        ];
    }
}
