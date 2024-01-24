<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\MultiImage;

beforeEach(function () {
    $path = realpath(
        __DIR__.'/../../Dataset/image.webp',
    );

    $this->path = sprintf('file://%s', $path);
});

it('can validate multi image type value', function () {
    $data = new stdClass();

    $object = MultiImage::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate('An apple a day.'))->toBeFalse();

    expect($object->validate($this->path))->toBeFalse();

    expect($object->validate([$this->path, 666]))->toBeFalse();

    expect($object->validate([$this->path]))->toBeTrue();
});

it('can validate multi image type value with min image size restriction', function () {
    $data = new stdClass();

    $data->minImageSize = 65535;

    $object = MultiImage::from($data);

    expect($object->validate([$this->path]))->toBeFalse();
});

it('can validate multi image type value with max image size restriction', function () {
    $data = new stdClass();

    $data->maxImageSize = 0;

    $object = MultiImage::from($data);

    expect($object->validate([$this->path]))->toBeFalse();
});
