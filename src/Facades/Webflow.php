<?php

declare(strict_types=1);

namespace Storipress\Webflow\Facades;

use Illuminate\Support\Facades\Facade;
use Storipress\Webflow\Requests\Collection;
use Storipress\Webflow\Requests\CollectionField;
use Storipress\Webflow\Requests\Item;
use Storipress\Webflow\Requests\Site;

/**
 * @property-read Site $site
 * @property-read Collection $collection
 * @property-read CollectionField $collectionField
 * @property-read Item $item
 * @property-read string $token
 * @property-read string $siteId
 * @property-read int $retryAfter
 * @property-read int $rateLimitRemaining
 * @method static static setSiteId()
 * @method static static setAccessToken()
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
