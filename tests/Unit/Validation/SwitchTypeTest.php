<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\SwitchType;

it('can validate switch type value', function () {
    $data = new stdClass();

    $object = SwitchType::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate('An apple a day.'))->toBeFalse();

    expect($object->validate(true))->toBeTrue();

    expect($object->validate(false))->toBeTrue();
});
