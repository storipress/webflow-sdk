<?php

declare(strict_types=1);

namespace Storipress\Webflow\Requests;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use JsonSchema\Constraints\Constraint;
use JsonSchema\Validator;
use stdClass;
use Storipress\Webflow\Exceptions\HttpAccessDenied;
use Storipress\Webflow\Exceptions\HttpBadRequest;
use Storipress\Webflow\Exceptions\HttpConflict;
use Storipress\Webflow\Exceptions\HttpException;
use Storipress\Webflow\Exceptions\HttpHitRateLimit;
use Storipress\Webflow\Exceptions\HttpNotFound;
use Storipress\Webflow\Exceptions\HttpServerError;
use Storipress\Webflow\Exceptions\HttpUnauthorized;
use Storipress\Webflow\Exceptions\HttpUnknownError;
use Storipress\Webflow\Exceptions\UnexpectedValueException;
use Storipress\Webflow\Webflow;

abstract class Request
{
    const VERSION = 'v2';

    const ENDPOINT = 'https://api.webflow.com';

    public function __construct(
        protected readonly Webflow $app,
    ) {
        //
    }

    /**
     * @param  'get'|'post'|'patch'|'delete'  $method
     * @param  non-empty-string  $path
     * @param  array<mixed>  $options
     * @return ($method is 'delete' ? bool : stdClass)
     *
     * @throws UnexpectedValueException
     * @throws HttpException
     */
    protected function request(
        string $method,
        string $path,
        array $options = [],
        ?string $schema = null,
    ): stdClass|bool {
        $response = $this
            ->app
            ->http
            ->withToken($this->app->token())
            ->{$method}($this->getUrl($path), $options);

        if (! ($response instanceof Response)) {
            throw new UnexpectedValueException();
        }

        if (! $response->successful()) {
            $this->error(
                $response->body(),
                $response->status(),
                $response->headers(),
            );
        }

        $this->setRateLimit($response);

        if ($method === 'delete') {
            return $response->successful();
        }

        $data = $response->object();

        if (! ($data instanceof stdClass)) {
            throw new UnexpectedValueException();
        }

        if (! is_string($schema)) {
            return $data;
        }

        $this->validate($data, $schema);

        return $data;
    }

    /**
     * @param  non-empty-string  $path
     * @return non-empty-string
     */
    protected function getUrl(string $path): string
    {
        return sprintf(
            '%s/%s/%s',
            rtrim(self::ENDPOINT, '/'),
            self::VERSION,
            ltrim($path, '/'),
        );
    }

    protected function setRateLimit(Response $response): void
    {
        $this->app->setRetryAfter(
            (int) $response->header('Retry-After'),
        );

        $this->app->setRateLimitRemaining(
            (int) $response->header('X-RateLimit-Remaining'),
        );
    }

    /**
     * @throws UnexpectedValueException
     */
    protected function validate(stdClass $data, string $schema): void
    {
        $file = realpath(
            sprintf('%s/../Schemas/%s.json', __DIR__, $schema),
        );

        if ($file === false) {
            return;
        }

        $path = sprintf('file://%s', $file);

        $validator = new Validator();

        $validator->validate($data, ['$ref' => $path], Constraint::CHECK_MODE_NORMAL | Constraint::CHECK_MODE_VALIDATE_SCHEMA);

        if ($validator->isValid()) {
            return;
        }

        throw new UnexpectedValueException();
    }

    /**
     * @param  array<string, array<int, string>>  $headers
     *
     * @throws HttpException
     */
    protected function error(string $message, int $code, array $headers): void
    {
        if ($code === 429) {
            $timestamp = Arr::get($headers, 'Retry-After.0');

            if (! is_string($timestamp)) {
                $timestamp = Arr::get($headers, 'X-RateLimit-Reset.0');
            }

            if (! is_string($timestamp)) {
                $timestamp = '60';
            }

            $ttl = Carbon::createFromTimestamp($timestamp);

            $retry = $ttl->isFuture() ? ((int) $ttl->diffInSeconds()) : $ttl->getTimestamp();
        }

        throw match ($code) {
            400 => new HttpBadRequest($message, $code),

            401 => new HttpUnauthorized($message, $code),

            403 => new HttpAccessDenied($message, $code),

            404 => new HttpNotFound($message, $code),

            409 => new HttpConflict($message, $code),

            429 => new HttpHitRateLimit($retry, $message, $code),

            500 => new HttpServerError($message, $code),

            default => new HttpUnknownError($message, $code),
        };
    }
}
