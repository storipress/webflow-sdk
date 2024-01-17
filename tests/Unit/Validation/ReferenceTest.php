<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\Reference;

it('can validate reference type value', function () {
    $data = new stdClass();

    $object = Reference::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate(fake()->unique()->uuid()))->toBeTrue();
});
