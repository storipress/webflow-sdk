<?php

use Storipress\Webflow\Objects\Webhook as WebhookObject;

it('can list webhooks', function () {
    $webhooks = $this
        ->webflow
        ->setSiteId('site_id')
        ->webhook()
        ->list();

    expect($webhooks)->toBeArray();

    expect($webhooks)->toHaveCount(3);

    $webhook = $webhooks[0];

    expect($webhook)->toBeInstanceOf(WebhookObject::class);

    expect($webhook->id)->toBe('57ca0a9e418c504a6e1acbb6');

    expect($webhook->triggerType)->toBe('form_submission');
});

it('can get webhook', function () {
    $webhook = $this
        ->webflow
        ->webhook()
        ->get('582266e0cd48de0f0e3c6d8b');

    expect($webhook)->toBeInstanceOf(WebhookObject::class);

    expect($webhook->id)->toBe('582266e0cd48de0f0e3c6d8b');

    expect($webhook->triggerType)->toBe('form_submission');
});

it('can create webhook', function () {
    $webhook = $this
        ->webflow
        ->setSiteId('582266e0cd48de0f0e3c6d8b/create')
        ->webhook()
        ->create('form_submission', 'https://webhook.site/7f7f7f7f-7f7f-7f7f-7f7f-7f7f7f7f7f7f');

    expect($webhook)->toBeInstanceOf(WebhookObject::class);

    expect($webhook->id)->toBe('582266e0cd48de0f0e3c6d8b');

    expect($webhook->triggerType)->toBe('form_submission');

    expect($webhook->url)->toBe('https://webhook.site/7f7f7f7f-7f7f-7f7f-7f7f-7f7f7f7f7f7f');
});
