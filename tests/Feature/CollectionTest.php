<?php

use Storipress\Webflow\Objects\Collection;
use Storipress\Webflow\Objects\CollectionField;
use Storipress\Webflow\Webflow;

it('can list collections', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $app->setSiteId('list');

    $collections = $app->collection()->list();

    expect($collections)->toBeArray();

    expect($collections)->toHaveCount(3);

    /** @var Collection[] $collections */
    $collection = $collections[0];

    expect($collection)->toBeInstanceOf(Collection::class);

    expect($collection->id)->toBe('63692ab61fb2852f582ba8f5');

    expect($collection->displayName)->toBe('Products');

    expect($collection->slug)->toBe('product');
});

it('can get collection', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $app->setCollectionId('580e63fc8c9a982ac9b8b745');

    $collection = $app->collection()->get();

    expect($collection)->toBeInstanceOf(Collection::class);

    /** @var Collection $collection */
    expect($collection->id)->toBe('580e63fc8c9a982ac9b8b745');

    expect($collection->displayName)->toBe('Blog Posts');

    expect($collection->slug)->toBe('post');
});

it('can create collection', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $app->setSiteId('create');

    $collection = $app->collection()->create();

    expect($collection)->toBeInstanceOf(Collection::class);

    /** @var Collection $collection */
    expect($collection->id)->toBe('580e63fc8c9a982ac9b8b745');

    expect($collection->displayName)->toBe('Blog Posts');

    expect($collection->slug)->toBe('post');

    expect($collection->fields)->toBeArray();

    $field = $collection->fields[0];

    expect($field)->toBeInstanceOf(CollectionField::class);

    expect($field->id)->toBe('23cc2d952d4e4631ffd4345d2743db4e');

    expect($field->displayName)->toBe('Name');

    expect($field->type)->toBe('PlainText');
});
