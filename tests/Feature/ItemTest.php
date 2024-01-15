<?php

use Illuminate\Support\Arr;
use Storipress\Webflow\Objects\Item;
use Storipress\Webflow\Objects\Pagination;

it('can list items', function () {
    $items = $this->webflow->item()->list('list');

    expect($items)->toHaveKey('data');

    expect($items)->toHaveKey('pagination');

    $data = Arr::get($items, 'data');

    expect($data)->toBeArray();

    expect($data)->toHaveCount(5);

    expect(Arr::first($data))->toBeInstanceOf(Item::class);

    expect($items['pagination'])->toBeInstanceOf(Pagination::class);
});

it('can get item', function () {
    $item = $this->webflow->item()->get('get', '659fbdf4163e480e7ebd1d9c');

    expect($item)->toBeInstanceOf(Item::class);

    expect($item->id)->toBe('659fbdf4163e480e7ebd1d9c');

    expect($item->fieldData)->toBeInstanceOf(stdClass::class);

    expect((array) $item->fieldData)->toHaveCount(23);
});

it('can create item', function () {
    $item = $this->webflow->item()->create(
        'create',
        [
            'isArchived' => false,
            'isDraft' => false,
            'fieldData' => [
                'date' => '2022-11-18T00:00:00.000Z',
                'featured' => false,
                'name' => 'My new item',
                'slug' => 'my-new-item',
                'color' => '#db4b68',
            ],
        ]
    );

    expect($item)->toBeInstanceOf(Item::class);

    expect($item->id)->toBe('63766b5d283694ddd30bcdce');

    $data = (array) $item->fieldData;

    expect($data)->toHaveKey('name');

    expect($data['name'])->toBe('My new item');
});

it('can update item', function () {
    $item = $this->webflow->item()->update(
        'update',
        '63766b5d283694ddd30bcdce',
        [
            'fieldData' => [
                'date' => '2022-11-18T00:00:00.000Z',
                'featured' => false,
                'name' => 'My new item',
                'slug' => 'my-new-item',
                'color' => '#db4b68',
            ],
        ],
    );

    expect($item)->toBeInstanceOf(Item::class);

    expect($item->id)->toBe('63766b5d283694ddd30bcdce');
});

it('can delete item', function () {
    $ok = $this->webflow->item()->delete('delete', '63766b5d283694ddd30bcdce');

    expect($ok)->toBeTrue();
});

it('can publish item', function () {
    $result = $this->webflow->item()->publish(
        'collection_id',
        [
            '643fd856d66b6528195ee2ca',
            '643fd856d66b6528195ee2cb',
            '643fd856d66b6528195ee2cf',
        ],
    );

    expect($result->publishedItemIds)->toHaveCount(2);
});
