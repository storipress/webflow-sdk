<?php

declare(strict_types=1);

namespace Storipress\Webflow\Requests;

use Storipress\Webflow\Objects\Collection as CollectionObject;
use Webmozart\Assert\Assert;

/**
 * @phpstan-import-type CollectionData from CollectionObject
 */
class Collection extends Request
{
    /**
     * https://developers.webflow.com/reference/list-collections
     *
     * @return CollectionObject[]
     */
    public function list(): array
    {
        $uri = sprintf('/sites/%s/collections', $this->app->siteId);

        /** @var array{collections: CollectionData[]}|null $data */
        $data = $this->request('get', $uri);

        Assert::isArray($data);

        Assert::keyExists($data, 'collections');

        $collections = [];

        foreach ($data['collections'] as $collection) {
            $collections[] = (new CollectionObject())->from($collection);
        }

        return $collections;
    }

    /**
     * https://developers.webflow.com/reference/create-collection
     */
    public function create(): CollectionObject
    {
        $uri = sprintf('/sites/%s/collections', $this->app->siteId);

        /** @var CollectionData|null $data */
        $data = $this->request('post', $uri);

        Assert::isArray($data);

        return (new CollectionObject())->from($data);
    }

    /**
     * https://developers.webflow.com/reference/collection-details
     */
    public function get(string $collectionId): CollectionObject
    {
        $uri = sprintf('/collections/%s', $collectionId);

        /** @var CollectionData|null $data */
        $data = $this->request('get', $uri);

        Assert::isArray($data);

        return (new CollectionObject())->from($data);
    }
}
