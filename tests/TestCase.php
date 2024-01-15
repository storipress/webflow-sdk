<?php

namespace Tests;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Storipress\Webflow\Webflow;

class TestCase extends BaseTestCase
{
    public Webflow $webflow;

    protected function setUp(): void
    {
        parent::setUp();

        $token = Str::random();

        $this->assertNotEmpty($token);

        $this->assertNotNull($this->app);

        $this->webflow = $this
            ->app
            ->make(Webflow::class)
            ->setToken($token);

        Http::preventStrayRequests();

        $data = require __DIR__.'/datasets.php';

        Http::fake($data);
    }
}
