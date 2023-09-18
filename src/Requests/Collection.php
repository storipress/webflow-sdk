<?php

declare(strict_types=1);

namespace Storipress\Webflow\Requests;

use Storipress\Webflow\Objects\Collection as CollectionObject;

/**
 * @phpstan-import-type CollectionData from CollectionObject
 */
class Collection extends Request
{
    /**
     * https://developers.webflow.com/reference/list-collections
     *
     * @return CollectionObject[]|null
     */
    public function list(): ?array
    {
        $uri = sprintf('/sites/%s/collections', $this->app->siteId);

        /** @var array{collections: CollectionData[]}|null $data */
        $data = $this->request('get', $uri);

        if (!is_array($data)) {
            return null;
        }

        $collections = [];

        foreach ($data['collections'] as $collection) {
            $collections[] = (new CollectionObject())->from($collection);
        }

        return $collections;
    }

    /**
     * https://developers.webflow.com/reference/create-collection
     */
    public function create(): ?CollectionObject
    {
        $uri = sprintf('/sites/%s/collections', $this->app->siteId);

        /** @var CollectionData|null $data */
        $data = $this->request('post', $uri);

        if (!is_array($data)) {
            return null;
        }

        return (new CollectionObject())->from($data);
    }

    /**
     * https://developers.webflow.com/reference/collection-details
     */
    public function get(): ?CollectionObject
    {
        $uri = sprintf('/collections/%s', $this->app->collectionId);

        /** @var CollectionData|null $data */
        $data = $this->request('get', $uri);

        if (!is_array($data)) {
            return null;
        }

        return (new CollectionObject())->from($data);
    }
}
