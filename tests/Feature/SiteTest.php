<?php

use Storipress\Webflow\Objects\CustomDomain;
use Storipress\Webflow\Objects\Site;

it('can list sites', function () {
    $sites = $this->webflow->site()->list();

    expect($sites)->toHaveCount(3);

    $site = $sites[0];

    expect($site)->toBeInstanceOf(Site::class);

    expect($site->id)->toBe('580e63e98c9a982ac9b8b741');

    expect($site->workspaceId)->toBe('580e63fc8c9a982ac9b8b744');

    expect($site->displayName)->toBe('api_docs_sample_json');

    expect($site->customDomains)->toBeArray();

    expect($site->customDomains)->toHaveCount(1);

    expect($site->customDomains[0])->toBeInstanceOf(CustomDomain::class);

    $domain = $site->customDomains[0];

    expect($domain->id)->toBe('589a331aa51e760df7ccb89e');

    expect($domain->url)->toBe('www.test-api-domain.com');
});

it('can get specific site', function () {
    $site = $this->webflow->site()->get('580e63e98c9a982ac9b8b741');

    expect($site)->toBeInstanceOf(Site::class);

    expect($site->id)->toBe('580e63e98c9a982ac9b8b741');

    expect($site->workspaceId)->toBe('580e63fc8c9a982ac9b8b744');

    expect($site->displayName)->toBe('api_docs_sample_json');

    expect($site->customDomains)->toBeArray();

    expect($site->customDomains)->toHaveCount(1);

    expect($site->customDomains[0])->toBeInstanceOf(CustomDomain::class);

    $domain = $site->customDomains[0];

    expect($domain->id)->toBe('589a331aa51e760df7ccb89e');

    expect($domain->url)->toBe('www.test-api-domain.com');
});

it('can publish specific site', function () {
    $site = $this->webflow->site()->publish(
        '580e63e98c9a982ac9b8b741',
        ['test-api-domain.com'],
        true,
    );

    expect($site)->toBeInstanceOf(stdClass::class);

    expect($site->customDomains)->toBeArray();

    expect($site->customDomains)->toHaveCount(2);

    foreach ($site->customDomains as $domain) {
        expect($domain)->toBeInstanceOf(CustomDomain::class);
    }

    $domain = $site->customDomains[1];

    expect($domain->id)->toBe('589a331aa51e760df7ccb89d');

    expect($domain->url)->toBe('test-api-domain.com');

    expect($site->publishToWebflowSubdomain)->toBeTrue();
});
