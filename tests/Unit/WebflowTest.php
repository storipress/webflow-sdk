<?php

declare(strict_types=1);

namespace Tests\Unit;

use Storipress\Webflow\Facades\Webflow;

it('can get webflow instance', function () {
    expect(app('webflow')->instance())->toBe($this->webflow);

    expect(Webflow::instance())->toBe($this->webflow);
});
