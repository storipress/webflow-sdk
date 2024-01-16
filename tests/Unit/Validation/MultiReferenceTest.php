<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\MultiReference;

it('can validate multi reference type value', function () {
    $data = new stdClass();

    $object = MultiReference::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate(fake()->unique()->uuid()))->toBeFalse();

    expect($object->validate([fake()->unique()->uuid(), 666]))->toBeFalse();

    expect($object->validate([fake()->unique()->uuid()]))->toBeTrue();
});
