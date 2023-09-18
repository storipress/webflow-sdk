<?php

use Storipress\Webflow\Objects\CustomDomain;
use Storipress\Webflow\Objects\Site;
use Storipress\Webflow\Webflow;

it('can list sites', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $sites = $app->setAccessToken(fake()->unique()->sha256())
        ->site()
        ->list();

    expect($sites)->toHaveCount(2);

    /** @var Site[] $sites */
    $site = $sites[0];

    expect($site)->toBeInstanceOf(Site::class);

    /** @var Site $site */
    expect($site->id)->toBe('580e63e98c9a982ac9b8b741');

    expect($site->workspaceId)->toBe('580e63fc8c9a982ac9b8b744');

    expect($site->displayName)->toBe('api_docs_sample_json');

    expect($site->customDomains)->toBeArray();

    expect($site->customDomains)->toHaveCount(1);

    expect($site->customDomains[0])->toBeInstanceOf(CustomDomain::class);

    /** @var CustomDomain $domain */
    $domain = $site->customDomains[0];

    expect($domain->id)->toBe('589a331aa51e760df7ccb89e');

    expect($domain->url)->toBe('www.test-api-domain.com');
});

it('can get specific site', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $app->setAccessToken(fake()->unique()->sha256())
        ->setSiteId('580e63e98c9a982ac9b8b741');

    $site = $app->site()->get();

    expect($site)->toBeInstanceOf(Site::class);

    /** @var Site $site */
    expect($site->id)->toBe('580e63e98c9a982ac9b8b741');

    expect($site->workspaceId)->toBe('580e63fc8c9a982ac9b8b744');

    expect($site->displayName)->toBe('api_docs_sample_json');

    expect($site->customDomains)->toBeArray();

    expect($site->customDomains)->toHaveCount(1);

    expect($site->customDomains[0])->toBeInstanceOf(CustomDomain::class);

    /** @var CustomDomain $domain */
    $domain = $site->customDomains[0];

    expect($domain->id)->toBe('589a331aa51e760df7ccb89e');

    expect($domain->url)->toBe('www.test-api-domain.com');
});

it('can publish specific site', function () {
    /** @var Webflow $app */
    $app = app()->make(Webflow::class);

    $app->setAccessToken(fake()->unique()->sha256())
        ->setSiteId('site_id');

    $site = $app->site()->publish();

    expect($site)->toBeInstanceOf(Site::class);

    /** @var Site $site */
    expect($site->customDomains)->toBeArray();

    expect($site->customDomains)->toHaveCount(2);

    foreach ($site->customDomains as $domain) {
        expect($domain)->toBeInstanceOf(CustomDomain::class);
    }

    /** @var CustomDomain $domain */
    $domain = $site->customDomains[1];

    expect($domain->id)->toBe('589a331aa51e760df7ccb89d');

    expect($domain->url)->toBe('test-api-domain.com');

    expect($site->publishToWebflowSubdomain)->toBeFalse();
});
