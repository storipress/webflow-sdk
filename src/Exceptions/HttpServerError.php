<?php

declare(strict_types=1);

namespace Storipress\Webflow\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class HttpServerError extends HttpException
{
    /**
     * @param  array<string, string>  $headers
     */
    public function __construct(string $message = '', \Throwable $previous = null, array $headers = [], int $code = 0)
    {
        parent::__construct(500, $message, $previous, $headers, $code);
    }
}
