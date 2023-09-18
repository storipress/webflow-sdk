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
    public Site $site;

    public Collection $collection;

    public CollectionField $collectionField;

    public Item $item;

    public string $token;

    public string $siteId;

    public string $collectionId;

    public string $itemId;

    public function __construct(
        public Factory $http,
    ) {
        //
    }

    public function setSiteId(string $siteId): self
    {
        $this->siteId = $siteId;

        return $this;
    }

    public function setCollectionId(string $collectionId): self
    {
        $this->collectionId = $collectionId;

        return $this;
    }

    public function setItemId(string $itemId): self
    {
        $this->itemId = $itemId;

        return $this;
    }

    public function setHttpClient(Factory $http): self
    {
        $this->http = $http;

        return $this;
    }

    public function setAccessToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function site(): Site
    {
        if (!isset($this->site)) {
            $this->site = new Site($this);
        }

        return $this->site;
    }

    public function collection(): Collection
    {
        if (!isset($this->collection)) {
            $this->collection = new Collection($this);
        }

        return $this->collection;
    }

    public function collectionField(): CollectionField
    {
        if (!isset($this->collectionField)) {
            $this->collectionField = new CollectionField($this);
        }

        return $this->collectionField;
    }

    public function item(): Item
    {
        if (!isset($this->item)) {
            $this->item = new Item($this);
        }

        return $this->item;
    }
}
