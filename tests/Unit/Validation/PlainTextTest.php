<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use Illuminate\Support\Str;
use stdClass;
use Storipress\Webflow\Objects\Validations\PlainText;

it('can validate plain text type value', function () {
    $data = new stdClass();

    $data->singleLine = false;

    $data->minLength = 3;

    $data->maxLength = 4;

    $object = PlainText::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate(Str::random(2)))->toBeFalse();

    expect($object->validate(Str::random(3)))->toBeTrue();

    expect($object->validate(Str::random(4)))->toBeTrue();

    expect($object->validate(Str::random(5)))->toBeFalse();
});

it('can validate plain text type value with single line restriction', function () {
    $data = new stdClass();

    $data->singleLine = true;

    $object = PlainText::from($data);

    $value = Str::of(fake()->unique()->sentence())
        ->newLine()
        ->append(fake()->unique()->sentence())
        ->newLine()
        ->append(fake()->unique()->sentence())
        ->toString();

    expect($object->validate($value))->toBeFalse();
});

it('can validate plain text type value without single line restriction', function () {
    $data = new stdClass();

    $data->singleLine = false;

    $object = PlainText::from($data);

    $value = Str::of(fake()->unique()->sentence())
        ->newLine()
        ->append(fake()->unique()->sentence())
        ->newLine()
        ->append(fake()->unique()->sentence())
        ->toString();

    expect($object->validate($value))->toBeTrue();
});
