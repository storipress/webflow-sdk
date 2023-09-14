<?php

namespace Storipress\Webflow\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class HttpUnauthorized extends HttpException
{
    /**
     * @param  array<string, string>  $headers
     */
    public function __construct(string $message = '', \Throwable $previous = null, int $code = 0, array $headers = [])
    {
        parent::__construct(401, $message, $previous, $headers, $code);
    }
}
