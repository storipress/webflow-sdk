<?php

declare(strict_types=1);

namespace Storipress\Webflow\Facades;

use Illuminate\Support\Facades\Facade;

final class Webflow extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'webflow';
    }
}