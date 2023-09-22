<?php

use Illuminate\Support\Arr;
use Storipress\Webflow\Objects\Item;
use Storipress\Webflow\Objects\Pagination;
use Storipress\Webflow\Webflow;

it('can list items', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $app->setAccessToken(fake()->unique()->sha256());

    $items = $app->item()->list('list');

    expect($items)->toHaveKey('data');

    expect($items)->toHaveKey('pagination');

    /** @var array{data: Item[]|null, pagination: Pagination|null} $items */
    $data = Arr::get($items, 'data');

    expect($data)->toBeArray();

    expect($data)->toHaveCount(1);

    /** @var Item[] $data */
    expect(Arr::first($data))->toBeInstanceOf(Item::class);

    expect($items['pagination'])->toBeInstanceOf(Pagination::class);
});

it('can get item', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $app->setAccessToken(fake()->unique()->sha256());

    $item = $app->item()->get('get', '63766b5d283694ddd30bcdce');

    /** @var Item $item */
    expect($item)->toBeInstanceOf(Item::class);

    expect($item->id)->toBe('63766b5d283694ddd30bcdce');

    expect($item->fieldData)->toBeArray();

    expect($item->fieldData)->toHaveCount(5);
});

it('can create item', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $app->setAccessToken(fake()->unique()->sha256());

    $item = $app->item()->create(
        collectionId: 'create',
        fields: [
            'date' => '2022-11-18T00:00:00.000Z',
            'featured' => false,
            'name' => 'My new item',
            'slug' => 'my-new-item',
            'color' => '#db4b68',
        ]
    );

    expect($item)->toBeInstanceOf(Item::class);

    /** @var Item $item */
    expect($item->id)->toBe('63766b5d283694ddd30bcdce');

    expect($item->fieldData)->toBeArray();

    expect($item->fieldData)->toHaveCount(5);

    expect($item->fieldData)->toHaveKey('name');

    expect($item->fieldData['name'])->toBe('My new item');
});

it('can update item', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $app->setAccessToken(fake()->unique()->sha256());

    $item = $app->item()->update(
        collectionId: 'update',
        itemId: '63766b5d283694ddd30bcdce',
        fields: [
            'date' => '2022-11-18T00:00:00.000Z',
            'featured' => false,
            'name' => 'My new item',
            'slug' => 'my-new-item',
            'color' => '#db4b68',
        ]
    );

    /** @var Item $item */
    expect($item)->toBeInstanceOf(Item::class);

    expect($item->id)->toBe('63766b5d283694ddd30bcdce');

    expect($item->fieldData)->toBeArray();

    expect($item->fieldData)->toHaveCount(5);
});

it('can delete item', function () {
    // TODO
});

it('can publish item', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $app->setAccessToken(fake()->unique()->sha256());

    $result = $app->item()->publish(
        'collection_id',
        [
            '643fd856d66b6528195ee2ca',
            '643fd856d66b6528195ee2cb',
            '643fd856d66b6528195ee2cf',
        ]
    );

    expect($result)->toBeArray();

    expect($result['publishedItemIds'])->toHaveCount(2);
});
