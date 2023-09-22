<?php

use Storipress\Webflow\Objects\CollectionField;
use Storipress\Webflow\Webflow;

it('can create collection field', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $app->setAccessToken(fake()->unique()->sha256());

    $field = $app->collectionField()->create('collection_id', false, 'RichText', 'Post Body');

    expect($field)->toBeInstanceOf(CollectionField::class);

    /** @var CollectionField $field */
    expect($field->id)->toBe('75821f618da60c18383330bcc0ca488b');

    expect($field->type)->toBe('RichText');

    expect($field->isRequired)->toBeFalse();
});

it('can update collection field', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $app->setAccessToken(fake()->unique()->sha256());

    $field = $app->collectionField()->update(
        'update',
        '75821f618da60c18383330bcc0ca488b',
        false,
        'RichText',
        'Post Body'
    );

    expect($field)->toBeInstanceOf(CollectionField::class);

    /** @var CollectionField $field */
    expect($field->id)->toBe('75821f618da60c18383330bcc0ca488b');

    expect($field->type)->toBe('RichText');

    expect($field->isRequired)->toBeFalse();
});

it('can delete collection field', function () {
    // TODO
});
