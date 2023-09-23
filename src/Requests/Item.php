<?php

declare(strict_types=1);

namespace Storipress\Webflow\Requests;

use stdClass;
use Storipress\Webflow\Exceptions\HttpException;
use Storipress\Webflow\Exceptions\UnexpectedValueException;
use Storipress\Webflow\Objects\Item as ItemObject;
use Storipress\Webflow\Objects\Pagination;

class Item extends Request
{
    /**
     * @param  int<0, max>  $offset
     * @param  int<1, 100>  $limit
     * @return array{
     *     data: array<int, ItemObject>,
     *     pagination: Pagination,
     * }
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function list(string $collectionId, int $offset = 0, int $limit = 100): array
    {
        $uri = sprintf('/collections/%s/items', $collectionId);

        $data = $this->request(
            'get',
            $uri,
            compact('offset', 'limit'),
        );

        return [
            'data' => array_map(
                fn ($data) => ItemObject::from($data),
                $data->items,
            ),
            'pagination' => Pagination::from($data->pagination),
        ];
    }

    /**
     * @param array{
     *     isArchived: bool,
     *     isDraft: bool,
     *     fieldData: non-empty-array<non-empty-string, mixed>,
     * } $params
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function create(string $collectionId, array $params): ItemObject
    {
        $uri = sprintf('/collections/%s/items', $collectionId);

        $data = $this->request('post', $uri, $params, 'collection-item');

        return ItemObject::from($data);
    }

    /**
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function get(string $collectionId, string $itemId): ItemObject
    {
        $uri = sprintf('/collections/%s/items/%s', $collectionId, $itemId);

        $data = $this->request('get', $uri, schema: 'collection-item');

        return ItemObject::from($data);
    }

    /**
     * @param array{
     *      isArchived?: bool,
     *      isDraft?: bool,
     *      fieldData?: non-empty-array<non-empty-string, mixed>,
     *  } $params
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function update(string $collectionId, string $itemId, array $params = []): ItemObject
    {
        $uri = sprintf('/collections/%s/items/%s', $collectionId, $itemId);

        $data = $this->request('patch', $uri, $params, 'collection-item');

        return ItemObject::from($data);
    }

    /**
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function delete(string $collectionId, string $itemId): bool
    {
        $uri = sprintf('/collections/%s/items/%s', $collectionId, $itemId);

        return $this->request('delete', $uri);
    }

    /**
     * @param  non-empty-array<int, non-empty-string>  $itemIds
     * @return stdClass{
     *     publishedItemIds: array<int, non-empty-string>,
     *     errors: array<int, non-empty-string>,
     * }
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function publish(string $collectionId, array $itemIds): stdClass
    {
        $uri = sprintf('/collections/%s/items/publish', $collectionId);

        return $this->request('post', $uri, compact('itemIds'), 'publish-item');
    }
}
