<?php

namespace Storipress\Webflow;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class WebflowServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
			'webflow',
			fn() => $this->app->make(Webflow::class)
		);
    }
}
