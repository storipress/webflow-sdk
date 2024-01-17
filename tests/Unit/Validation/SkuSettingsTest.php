<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\SkuSettings;

it('can validate sku settings type value', function () {
    $data = new stdClass();

    $object = SkuSettings::from($data);

    expect($object->validate(666))->toBeTrue();

    expect($object->validate('An apple a day.'))->toBeTrue();

    expect($object->validate(fake()->unique()->url()))->toBeTrue();
});
