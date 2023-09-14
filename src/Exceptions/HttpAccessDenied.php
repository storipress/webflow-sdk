<?php

namespace Storipress\Webflow\Exceptions;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class HttpAccessDenied extends AccessDeniedHttpException
{
    /**
     * @param  array<string, string>  $headers
     */
    public function __construct(string $message = '', \Throwable $previous = null, int $code = 0, array $headers = [])
    {
        parent::__construct($message, $previous, $code, $headers);
    }
}
