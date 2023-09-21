<?php

declare(strict_types=1);

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
    const VERSION = 'v2';

    const ENDPOINT = 'https://api.webflow.com';

    /**
     * @var array<array<int, mixed>>
     */
    public array $headers;

    public function __construct(
        protected Webflow $app,
    ) {
        //
    }

    /**
     * @param  array<mixed>  $options
     * @return array<mixed>|bool|null
     */
    protected function request(string $method, string $uri, array $options = []): array|bool|null
    {
        $url = sprintf('%s/%s%s', self::ENDPOINT, self::VERSION, $uri);

        /** @var Response $response */
        $response = $this->app->http
            ->withToken($this->app->token)
            ->{$method}($url, $options);

        $this->headers = $response->headers();

        if (!$response->successful()) {
            $this->error($response->status(), $response->body());
        }

        if ($method === 'delete') {
            return $response->successful();
        }

        /** @var array<mixed> $result */
        $result = $response->json();

        return $result;
    }

    protected function error(int $code, string $message): void
    {
        match ($code) {
            400 => throw new HttpBadRequest($message),

            401 => throw new HttpUnauthorized($message),

            403 => throw new HttpAccessDenied($message),

            404 => throw new HttpNotFound($message),

            429 => throw new HttpHitRateLimit(
                retryAfter: $this->headers['X-Ratelimit-Reset'][0] - time(),
                message: $message
            ),

            500 => throw new HttpServerError($message),

            default => null,
        };
    }
}
