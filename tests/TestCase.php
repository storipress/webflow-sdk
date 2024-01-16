<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Storipress\Webflow\Webflow;

class TestCase extends BaseTestCase
{
    use WithWorkbench;

    public Webflow $webflow;

    protected function setUp(): void
    {
        parent::setUp();

        $token = Str::random();

        $this->assertNotEmpty($token);

        $this->assertNotNull($this->app);

        $this->webflow = $this
            ->app
            ->make('webflow')
            ->setToken($token);

        Http::preventStrayRequests();

        $data = require __DIR__.'/Dataset/all.php';

        Http::fake($data);
    }
}
