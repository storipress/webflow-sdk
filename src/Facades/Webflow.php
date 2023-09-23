<?php

declare(strict_types=1);

namespace Storipress\Webflow\Facades;

use Illuminate\Support\Facades\Facade;
use Storipress\Webflow\Requests\Collection;
use Storipress\Webflow\Requests\CollectionField;
use Storipress\Webflow\Requests\Item;
use Storipress\Webflow\Requests\Site;

/**
 * @method static Site site()
 * @method static Collection collection()
 * @method static CollectionField collectionField()
 * @method static Item item()
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
