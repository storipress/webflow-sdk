<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\DateTime;

it('can validate datetime type value', function () {
    $data = new stdClass();

    $object = DateTime::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate('An apple a day.'))->toBeFalse();

    expect($object->validate('2024-01-16T01:43:06+00:00'))->toBeTrue();
});
