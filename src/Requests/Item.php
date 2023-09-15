<?php

namespace Storipress\Webflow\Requests;

use Storipress\Webflow\Objects\Item as ItemObject;
use Storipress\Webflow\Objects\Pagination;

/**
 * @phpstan-import-type ItemData from ItemObject
 * @phpstan-import-type PaginationData from Pagination
 */
class Item extends Request
{
    /**
     * @return array{data: ItemObject[], pagination: Pagination}|null
     */
    public function list(int $offset = null, int $limit = null): ?array
    {
        $options = [];

        if ($offset) {
            $options['offset'] = $offset;
        }

        if ($limit) {
            $options['limit'] = $limit;
        }

        $uri = sprintf('/collections/%s/items', $this->app->collectionId);

        /** @var array{items: ItemData[], pagination: PaginationData}|null $data */
        $data = $this->request('get', $uri, $options);

        if (is_null($data)) {
            return null;
        }

        $items = [];

        foreach ($data['items'] as $item) {
            $items[] = (new ItemObject())->from($item);
        }

        $pagination = (new Pagination())->from($data['pagination']);

        return [
            'data' => $items,
            'pagination' => $pagination,
        ];
    }

    /**
     * @param  array<mixed>  $fields
     */
    public function create(bool $isArchived = false, bool $isDraft = false, array $fields = []): ?ItemObject
    {
        $options = [
            'isArchived' => $isArchived,
            'isDraft' => $isDraft,
            'fieldData' => $fields,
        ];

        $uri = sprintf('/collections/%s/items', $this->app->collectionId);

        /** @var ItemData|null $data */
        $data = $this->request('post', $uri, $options);

        if (is_null($data)) {
            return null;
        }

        return (new ItemObject())->from($data);
    }

    public function get(): ?ItemObject
    {
        $uri = sprintf('/collections/%s/items/%s', $this->app->collectionId, $this->app->itemId);

        /** @var ItemData|null $data */
        $data = $this->request('get', $uri);

        if (is_null($data)) {
            return null;
        }

        return (new ItemObject())->from($data);
    }

    /**
     * @param  array<mixed>  $fields
     */
    public function update(bool $isArchived = false, bool $isDraft = false, array $fields = []): ?ItemObject
    {
        $options = [
            'isArchived' => $isArchived,
            'isDraft' => $isDraft,
            'fieldData' => $fields,
        ];

        $uri = sprintf('/collections/%s/items/%s', $this->app->collectionId, $this->app->itemId);

        /** @var ItemData|null $data */
        $data = $this->request('patch', $uri, $options);

        if (is_null($data)) {
            return null;
        }

        return (new ItemObject())->from($data);
    }

    public function delete(): bool
    {
        $uri = sprintf('/collections/%s/items/%s', $this->app->collectionId, $this->app->itemId);

        $this->request('delete', $uri);

        return true;
    }

    /**
     * @param  string[]  $itemIds
     * @return array{publishedItemIds: string[], errors: string[]}
     */
    public function publish(array $itemIds = []): array
    {
        $uri = sprintf('/collections/%s/items/publish', $this->app->collectionId);

        $options = [
            'itemIds' => $itemIds,
        ];

        /** @var array{publishedItemIds: string[], errors: string[]} $data */
        $data = $this->request('post', $uri, $options);

        return $data;
    }
}
