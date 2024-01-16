<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\Phone;

it('can validate phone type value', function () {
    $data = new stdClass();

    $object = Phone::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate(fake()->unique()->phoneNumber()))->toBeTrue();
});
