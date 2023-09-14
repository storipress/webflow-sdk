<?php

namespace Storipress\Webflow\Requests;

use Illuminate\Http\Client\Response;
use Storipress\Webflow\Exceptions\HttpAccessDenied;
use Storipress\Webflow\Exceptions\HttpBadRequest;
use Storipress\Webflow\Exceptions\HttpHitRateLimit;
use Storipress\Webflow\Exceptions\HttpNotFound;
use Storipress\Webflow\Exceptions\HttpServerError;
use Storipress\Webflow\Exceptions\HttpUnauthorized;
use Storipress\Webflow\Webflow;

abstract class Request
{
    const VERSION = 'beta';

    const ENDPOINT = 'https://api.webflow.com';

    public function __construct(protected Webflow $app)
    {
    }

	/**
	 * @param string $method
	 * @param string $uri
	 * @param array<mixed> $options
	 * @return array<mixed>|null
	 */
    protected function request(string $method, string $uri, array $options = []): array|null
    {
        $url = sprintf('%s/%s%s', self::ENDPOINT, self::VERSION, $uri);

        /** @var Response $response */
        $response = $this->app->http->{$method}($url, $options);

        if (! $response->successful()) {
            $this->error($response->status(), $response->body(), $response->headers());
        }

		/** @var array<mixed>|null $result */
		$result = $response->json();

        return $result;
    }

	/**
	 * @param int $code
	 * @param string $message
	 * @param array<mixed> $headers
	 * @return void
	 */
    protected function error(int $code, string $message, array $headers): void
    {
        match ($code) {
            400 => throw new HttpBadRequest($message),

            401 => throw new HttpUnauthorized($message),

            403 => throw new HttpAccessDenied($message),

            404 => throw new HttpNotFound($message),

            429 => throw new HttpHitRateLimit($message),

            500 => throw new HttpServerError($message),

			default => null,
        };
    }
}
