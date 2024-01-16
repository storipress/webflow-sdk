<?php

declare(strict_types=1);

namespace Tests\Feature;

use Storipress\Webflow\Objects\CollectionField;

it('can create collection field', function () {
    $field = $this
        ->webflow
        ->collectionField()
        ->create(
            'collection_id',
            [
                'displayName' => 'Branc',
                'type' => 'PlainText',
                'isRequired' => false,
            ],
        );

    expect($field)->toBeInstanceOf(CollectionField::class);

    expect($field->id)->toBe('737d6ade0415de8581e74e94a5cf4590');

    expect($field->type)->toBe('PlainText');

    expect($field->isRequired)->toBeFalse();
});

it('can update collection field', function () {
    $field = $this
        ->webflow
        ->collectionField()
        ->update(
            'update',
            '737d6ade0415de8581e74e94a5cf4590',
            [
                'isRequired' => true,
            ],
        );

    expect($field)->toBeInstanceOf(CollectionField::class);

    expect($field->id)->toBe('737d6ade0415de8581e74e94a5cf4590');

    expect($field->type)->toBe('PlainText');

    expect($field->isRequired)->toBeTrue();
});

it('can delete collection field', function () {
    $ok = $this
        ->webflow
        ->collectionField()
        ->delete(
            'delete',
            '737d6ade0415de8581e74e94a5cf4590',
        );

    expect($ok)->toBeTrue();
});
