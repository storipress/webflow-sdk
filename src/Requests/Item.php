<?php

namespace Storipress\Webflow\Requests;

use Storipress\Webflow\Objects\Item as ItemObject;
use Storipress\Webflow\Objects\Pagination;
use Webmozart\Assert\Assert;

/**
 * @phpstan-import-type ItemData from ItemObject
 * @phpstan-import-type PaginationData from Pagination
 */
class Item extends Request
{
    /**
     * @return array{data: ItemObject[], pagination: Pagination}
     */
    public function list(string $collectionId, int $offset = null, int $limit = null): array
    {
        $options = [];

        if ($offset) {
            $options['offset'] = $offset;
        }

        if ($limit) {
            $options['limit'] = $limit;
        }

        $uri = sprintf('/collections/%s/items', $collectionId);

        /** @var array{items: ItemData[], pagination: PaginationData}|null $data */
        $data = $this->request('get', $uri, $options);

        Assert::isArray($data);

        Assert::keyExists($data, 'items');

        Assert::keyExists($data, 'pagination');

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
    public function create(string $collectionId, bool $isArchived = false, bool $isDraft = false, array $fields = []): ItemObject
    {
        $options = [
            'isArchived' => $isArchived,
            'isDraft' => $isDraft,
            'fieldData' => $fields,
        ];

        $uri = sprintf('/collections/%s/items', $collectionId);

        /** @var ItemData|null $data */
        $data = $this->request('post', $uri, $options);

        Assert::isArray($data);

        return (new ItemObject())->from($data);
    }

    public function get(string $collectionId, string $itemId): ItemObject
    {
        $uri = sprintf('/collections/%s/items/%s', $collectionId, $itemId);

        /** @var ItemData|null $data */
        $data = $this->request('get', $uri);

        Assert::isArray($data);

        return (new ItemObject())->from($data);
    }

    /**
     * @param  array<mixed>  $fields
     */
    public function update(string $collectionId, string $itemId, bool $isArchived = false, bool $isDraft = false, array $fields = []): ?ItemObject
    {
        $options = [
            'isArchived' => $isArchived,
            'isDraft' => $isDraft,
        ];

        if (!empty($fields)) {
            $options['fieldData'] = $fields;
        }

        $uri = sprintf('/collections/%s/items/%s', $collectionId, $itemId);

        /** @var ItemData|null $data */
        $data = $this->request('patch', $uri, $options);

        Assert::isArray($data);

        return (new ItemObject())->from($data);
    }

    public function delete(string $collectionId, string $itemId): bool
    {
        $uri = sprintf('/collections/%s/items/%s', $collectionId, $itemId);

        $deleted = $this->request('delete', $uri);

        return (!is_bool($deleted)) ? false : $deleted;
    }

    /**
     * @param  string[]  $itemIds
     * @return array{publishedItemIds: string[], errors: string[]}
     */
    public function publish(string $collectionId, array $itemIds = []): array
    {
        $uri = sprintf('/collections/%s/items/publish', $collectionId);

        $options = [
            'itemIds' => $itemIds,
        ];

        /** @var array{publishedItemIds: string[], errors: string[]} $data */
        $data = $this->request('post', $uri, $options);

        Assert::isArray($data);

        Assert::keyExists($data, 'publishedItemIds');

        Assert::keyExists($data, 'errors');

        return $data;
    }
}
