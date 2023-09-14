<?php

declare(strict_types=1);

namespace Storipress\Webflow\Exceptions;

use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class HttpHitRateLimit extends TooManyRequestsHttpException
{
    /**
     * @param  array<string, string>  $headers
     */
    public function __construct(int|string $retryAfter = null, string $message = '', \Throwable $previous = null, int $code = 0, array $headers = [])
    {
        parent::__construct($retryAfter, $message, $previous, $code, $headers);
    }
}
