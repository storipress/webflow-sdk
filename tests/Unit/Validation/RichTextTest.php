<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use Illuminate\Support\Str;
use stdClass;
use Storipress\Webflow\Objects\Validations\RichText;

it('can validate rich text type value', function () {
    $data = new stdClass();

    $data->minLength = 3;

    $data->maxLength = 4;

    $object = RichText::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate(Str::random(2)))->toBeFalse();

    expect($object->validate(Str::random(3)))->toBeTrue();

    expect($object->validate(Str::random(4)))->toBeTrue();

    expect($object->validate(Str::random(5)))->toBeFalse();
});
