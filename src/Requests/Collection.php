<?php

declare(strict_types=1);

namespace Storipress\Webflow\Requests;

use stdClass;
use Storipress\Webflow\Exceptions\HttpException;
use Storipress\Webflow\Exceptions\UnexpectedValueException;
use Storipress\Webflow\Objects\Collection as CollectionObject;
use Storipress\Webflow\Objects\SimpleCollection as SimpleCollectionObject;

class Collection extends Request
{
    /**
     * @see https://developers.webflow.com/reference/list-collections
     *
     * @return array<int, SimpleCollectionObject>
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function list(string $siteId): array
    {
        $uri = sprintf('/sites/%s/collections', $siteId);

        $data = $this->request('get', $uri, schema: 'list-collections');

        return array_map(
            fn (stdClass $data) => SimpleCollectionObject::from($data),
            $data->collections,
        );
    }

    /**
     * @see https://developers.webflow.com/reference/create-collection
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function create(
        string $siteId,
        string $displayName,
        string $singularName,
        ?string $slug = null,
    ): CollectionObject {
        $uri = sprintf('/sites/%s/collections', $siteId);

        $data = $this->request(
            'post',
            $uri,
            array_filter(compact('displayName', 'singularName', 'slug')),
            'collection-details',
        );

        return CollectionObject::from($data);
    }

    /**
     * @see https://developers.webflow.com/reference/collection-details
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function get(string $collectionId): CollectionObject
    {
        $uri = sprintf('/collections/%s', $collectionId);

        $data = $this->request('get', $uri, schema: 'collection-details');

        return CollectionObject::from($data);
    }
}
