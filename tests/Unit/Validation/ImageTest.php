<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\Image;

beforeEach(function () {
    $path = realpath(
        __DIR__.'/../../Dataset/image.webp',
    );

    $this->path = sprintf('file://%s', $path);
});

it('can validate image type value', function () {
    $data = new stdClass();

    $object = Image::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate('An apple a day.'))->toBeFalse();

    expect($object->validate($this->path))->toBeTrue();
});

it('can validate image type value with min image size restriction', function () {
    $data = new stdClass();

    $data->minImageSize = 65535;

    $object = Image::from($data);

    expect($object->validate($this->path))->toBeFalse();
});

it('can validate image type value with max image size restriction', function () {
    $data = new stdClass();

    $data->maxImageSize = 0;

    $object = Image::from($data);

    expect($object->validate($this->path))->toBeFalse();
});

it('can validate image type value with min image width restriction', function () {
    $data = new stdClass();

    $data->minImageWidth = 65535;

    $object = Image::from($data);

    expect($object->validate($this->path))->toBeFalse();
});

it('can validate image type value with max image width restriction', function () {
    $data = new stdClass();

    $data->maxImageWidth = 1;

    $object = Image::from($data);

    expect($object->validate($this->path))->toBeFalse();
});

it('can validate image type value with min image height restriction', function () {
    $data = new stdClass();

    $data->minImageHeight = 65535;

    $object = Image::from($data);

    expect($object->validate($this->path))->toBeFalse();
});

it('can validate image type value with max image height restriction', function () {
    $data = new stdClass();

    $data->maxImageHeight = 1;

    $object = Image::from($data);

    expect($object->validate($this->path))->toBeFalse();
});

it('can validate image type value with svg format', function () {
    $data = new stdClass();

    $data->maxImageSize = 65535;

    $object = Image::from($data);

    $path = realpath(
        __DIR__.'/../../Dataset/image.svg',
    );

    $path = sprintf('file://%s', $path);

    expect($object->validate($path))->toBeTrue();
});

it('can validate svg image type value with max image height restriction', function () {
    $data = new stdClass();

    $data->maxImageHeight = 1;

    $object = Image::from($data);

    $path = realpath(
        __DIR__.'/../../Dataset/image.svg',
    );

    $path = sprintf('file://%s', $path);

    expect($object->validate($path))->toBeFalse();
});

it('can validate svg image type value with max image width restriction', function () {
    $data = new stdClass();

    $data->maxImageWidth = 1;

    $object = Image::from($data);

    $path = realpath(
        __DIR__.'/../../Dataset/image.svg',
    );

    $path = sprintf('file://%s', $path);

    expect($object->validate($path))->toBeFalse();
});
