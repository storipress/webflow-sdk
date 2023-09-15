<?php

declare(strict_types=1);

namespace Storipress\Webflow\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Storipress\Webflow\Requests\Site site()
 * @method static \Storipress\Webflow\Requests\Collection collection()
 * @method static \Storipress\Webflow\Requests\CollectionField collectionField()
 * @method static \Storipress\Webflow\Requests\Item item()
 */
class Webflow extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'webflow';
    }
}
