<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\Number;

it('can validate number type value', function () {
    $data = new stdClass();

    $object = Number::from($data);

    expect($object->validate('Hello, World!'))->toBeFalse();

    expect($object->validate(666))->toBeTrue();
});

it('can validate number type value with positive integer', function () {
    $data = new stdClass();

    $data->format = 'integer';

    $data->allowNegative = false;

    $data->minValue = -10;

    $data->maxValue = 4;

    $object = Number::from($data);

    expect($object->validate(-3))->toBeFalse();

    expect($object->validate(3.5))->toBeFalse();

    expect($object->validate(5))->toBeFalse();

    expect($object->validate(0))->toBeTrue();

    expect($object->validate(4))->toBeTrue();
});

it('can validate number type value with negative integer', function () {
    $data = new stdClass();

    $data->format = 'integer';

    $data->allowNegative = true;

    $data->minValue = -1;

    $data->maxValue = 1;

    $object = Number::from($data);

    expect($object->validate(2))->toBeFalse();

    expect($object->validate(0.5))->toBeFalse();

    expect($object->validate(-5))->toBeFalse();

    expect($object->validate(-1))->toBeTrue();

    expect($object->validate(0))->toBeTrue();

    expect($object->validate(1))->toBeTrue();
});

it('can validate number type value with decimal', function () {
    $data = new stdClass();

    $data->format = 'decimal';

    $data->allowNegative = true;

    $object = Number::from($data);

    expect($object->validate(-1))->toBeTrue();

    expect($object->validate(-0.5))->toBeTrue();

    expect($object->validate(0))->toBeTrue();

    expect($object->validate(0.5))->toBeTrue();

    expect($object->validate(1))->toBeTrue();
});
