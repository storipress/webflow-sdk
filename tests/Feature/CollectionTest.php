<?php

use Storipress\Webflow\Objects\Collection;
use Storipress\Webflow\Objects\CollectionField;
use Storipress\Webflow\Objects\SimpleCollection as SimpleCollectionObject;

it('can list collections', function () {
    $collections = $this
        ->webflow
        ->collection()
        ->list('list');

    expect($collections)->toBeArray();

    expect($collections)->toHaveCount(8);

    $collection = $collections[0];

    expect($collection)->toBeInstanceOf(SimpleCollectionObject::class);

    expect($collection->id)->toBe('6514fcd34a9cbbd7c7e12666');

    expect($collection->displayName)->toBe('Blog Posts');

    expect($collection->slug)->toBe('posts');
});

it('can get collection', function () {
    $collection = $this
        ->webflow
        ->collection()
        ->get('6514fcd34a9cbbd7c7e12666');

    expect($collection)->toBeInstanceOf(Collection::class);

    expect($collection->id)->toBe('6514fcd34a9cbbd7c7e12666');

    expect($collection->displayName)->toBe('Blog Posts');

    expect($collection->slug)->toBe('posts');
});

it('can create collection', function () {
    $collection = $this
        ->webflow
        ->collection()
        ->create('create', 'Blog Posts', 'Blog Post');

    expect($collection)->toBeInstanceOf(Collection::class);

    expect($collection->id)->toBe('65a4ec92a1e4c06fc307b162');

    expect($collection->displayName)->toBe('Blog Posts');

    expect($collection->slug)->toBe('blog-post');

    expect($collection->fields)->toBeArray();

    $field = $collection->fields[0];

    expect($field)->toBeInstanceOf(CollectionField::class);

    expect($field->id)->toBe('19ca024c6d7fb9946ad10be6961a02ff');

    expect($field->displayName)->toBe('Name');

    expect($field->type)->toBe('PlainText');
});
