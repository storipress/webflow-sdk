<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\VideoLink;

it('can validate video link type value', function () {
    $data = new stdClass();

    $object = VideoLink::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate('An apple a day.'))->toBeFalse();

    expect($object->validate(fake()->unique()->url()))->toBeTrue();
});
