<?php

use Storipress\Webflow\Objects\CollectionField;

it('can create collection field', function () {
    $field = $this
        ->webflow
        ->collectionField
        ->create(
            'collection_id',
            false,
            'RichText',
            'Post Body',
        );

    expect($field)->toBeInstanceOf(CollectionField::class);

    expect($field->id)->toBe('75821f618da60c18383330bcc0ca488b');

    expect($field->type)->toBe('RichText');

    expect($field->isRequired)->toBeFalse();
});

it('can update collection field', function () {
    $field = $this
        ->webflow
        ->collectionField
        ->update(
            'update',
            '75821f618da60c18383330bcc0ca488b',
            false,
            'RichText',
            'Post Body',
        );

    expect($field)->toBeInstanceOf(CollectionField::class);

    expect($field->id)->toBe('75821f618da60c18383330bcc0ca488b');

    expect($field->type)->toBe('RichText');

    expect($field->isRequired)->toBeFalse();
});

it('can delete collection field', function () {
    // TODO
});
