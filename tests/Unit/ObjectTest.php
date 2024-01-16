<?php

declare(strict_types=1);

namespace Tests\Unit;

use stdClass;
use Storipress\Webflow\Objects\CustomDomain;

it('can get/set arbitrary data to webflow object', function () {
    $data = new stdClass();

    $data->id = fake()->unique()->uuid();

    $data->url = fake()->unique()->domainName();

    $domain = new CustomDomain($data);

    expect($domain->port)->toBeNull(); // @phpstan-ignore-line

    $domain->port = 8888; // @phpstan-ignore-line

    expect($domain->port)->toBe(8888);

    expect($domain->getRaw())->toBe($data);
});
