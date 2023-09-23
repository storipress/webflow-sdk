<?php

declare(strict_types=1);

namespace Storipress\Webflow;

use Illuminate\Http\Client\Factory;
use Storipress\Webflow\Requests\Collection;
use Storipress\Webflow\Requests\CollectionField;
use Storipress\Webflow\Requests\Item;
use Storipress\Webflow\Requests\Site;

class Webflow
{
    public readonly Site $site;

    public Collection $collection;

    public CollectionField $collectionField;

    public Item $item;

    public string $token;

    public string $siteId;

    public int $retryAfter = 60;

    public int $rateLimitRemaining = 60;

    public function __construct(
        public Factory $http,
    ) {
        $this->site = new Site($this);

        $this->collection = new Collection($this);

        $this->collectionField = new CollectionField($this);

        $this->item = new Item($this);
    }

    /**
     * @param  non-empty-string  $siteId
     */
    public function setSiteId(string $siteId): self
    {
        $this->siteId = $siteId;

        return $this;
    }

    /**
     * @param  non-empty-string  $token
     */
    public function setAccessToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }
}
