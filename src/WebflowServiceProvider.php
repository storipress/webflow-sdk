<?php

declare(strict_types=1);

namespace Storipress\Webflow;

use Illuminate\Support\ServiceProvider;

class WebflowServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'webflow',
            fn () => $this->app->make(Webflow::class),
        );
    }
}
