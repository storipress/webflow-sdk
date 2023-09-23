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
 * @method static string token()
 * @method static string siteId()
 * @method static int retryAfter()
 * @method static int rateLimitRemaining()
 * @method static \Storipress\Webflow\Webflow setSiteId(string $siteId)
 * @method static \Storipress\Webflow\Webflow setToken(string $token)
 * @method static \Storipress\Webflow\Webflow instance()
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
