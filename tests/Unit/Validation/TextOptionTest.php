<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\TextOption;

it('can validate text option type value', function () {
    $data = new stdClass();

    $object = TextOption::from($data);

    expect($object->validate(666))->toBeTrue();

    expect($object->validate('An apple a day.'))->toBeTrue();

    expect($object->validate(fake()->unique()->url()))->toBeTrue();
});
