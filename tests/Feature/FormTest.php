<?php

declare(strict_types=1);

namespace Tests\Feature;

it('can list form', function () {
    $forms = $this
        ->webflow
        ->form()
        ->list('580e63e98c9a982ac9b8b741');

    expect($forms)->toBeArray();

    expect($forms['data'])->toHaveCount(2);

    $form = $forms['data'][0];

    expect($form->siteId)->toBe('580e63e98c9a982ac9b8b741');
});
