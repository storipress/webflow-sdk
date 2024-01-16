<?php

declare(strict_types=1);

namespace Tests\Unit\Validation;

use stdClass;
use Storipress\Webflow\Objects\Validations\Email;

it('can validate email type value', function () {
    $data = new stdClass();

    $object = Email::from($data);

    expect($object->validate(666))->toBeFalse();

    expect($object->validate('An apple a day.'))->toBeFalse();

    expect($object->validate('noreply@storipress.com'))->toBeTrue();
});
