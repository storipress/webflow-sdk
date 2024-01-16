<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\Option;

it('can validate option type value', function () {
    $data = new stdClass();

    $data->options = [
        [
            'id' => $id1 = fake()->unique()->uuid(),
            'name' => fake()->unique()->name(),
        ],
        [
            'id' => fake()->unique()->uuid(),
            'name' => fake()->unique()->name(),
        ],
    ];

    $object = Option::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate(fake()->unique()->uuid()))->toBeFalse();

    expect($object->validate($id1))->toBeTrue();
});
