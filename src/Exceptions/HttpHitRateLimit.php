<?php

declare(strict_types=1);

namespace Storipress\Webflow\Exceptions;

use Throwable;

class HttpHitRateLimit extends HttpException
{
    public function __construct(
        public readonly ?int $retryAfter = null,
        string $message = '',
        int $code = 0,
        Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }
}
