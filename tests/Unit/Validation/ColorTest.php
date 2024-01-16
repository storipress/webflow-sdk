<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\Color;

it('can validate color value', function () {
    $data = new stdClass();

    $object = Color::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate('#ffffff'))->toBeTrue();
});
