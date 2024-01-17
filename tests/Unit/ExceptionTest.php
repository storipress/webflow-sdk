<?php

declare(strict_types=1);

namespace Tests\Unit;

use Storipress\Webflow\Exceptions\HttpAccessDenied;
use Storipress\Webflow\Exceptions\HttpBadRequest;
use Storipress\Webflow\Exceptions\HttpConflict;
use Storipress\Webflow\Exceptions\HttpHitRateLimit;
use Storipress\Webflow\Exceptions\HttpNotFound;
use Storipress\Webflow\Exceptions\HttpServerError;
use Storipress\Webflow\Exceptions\HttpUnauthorized;

it('can convert message to error object', function () {
    $encoded = '{"message":"Requested resource not found","code":"resource_not_found","externalReference":null,"details":[]}';

    $exception = new HttpNotFound($encoded, 404);

    expect($exception->error->message)->toBe('Requested resource not found');

    expect($exception->error->code)->toBe('resource_not_found');

    expect($exception->error->externalReference)->toBeNull();

    expect($exception->error->details)->toBeArray();

    expect($exception->error->details)->toBeEmpty();
});

it('will fallback when decoding failed', function () {
    $encoded = '404 Not Found';

    $exception = new HttpNotFound($encoded, 404);

    expect($exception->error->message)->toBe('404 Not Found');

    expect($exception->error->code)->toBe('404');

    expect($exception->error->externalReference)->toBeNull();

    expect($exception->error->details)->toBeArray();

    expect($exception->error->details)->toBeEmpty();
});

it('will throw exception', function (int $code, string $exception) {
    expect(
        fn () => $this->webflow->site()->get(sprintf('exception-%d', $code)),
    )->toThrow($exception);
})->with([
    [400, HttpBadRequest::class],
    [401, HttpUnauthorized::class],
    [403, HttpAccessDenied::class],
    [404, HttpNotFound::class],
    [409, HttpConflict::class],
    [429, HttpHitRateLimit::class],
    [500, HttpServerError::class],
]);

it('can get rate limit information from exception', function () {
    $this->webflow->collectionField()->delete('delete', '429');

    expect($this->webflow->retryAfter())->toBe(30);

    expect($this->webflow->rateLimitRemaining())->toBe(0);
});
