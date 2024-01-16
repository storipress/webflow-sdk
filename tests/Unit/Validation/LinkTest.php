<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\Link;

it('can validate link type value', function () {
    $data = new stdClass();

    $object = Link::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate('An apple a day.'))->toBeFalse();

    expect($object->validate(fake()->unique()->url()))->toBeTrue();
});
