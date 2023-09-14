<?php

namespace Storipress\Webflow\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HttpNotFound extends NotFoundHttpException
{
	/**
	 * @param array<string, string> $headers
	 */
    public function __construct(string $message = '', \Throwable $previous = null, int $code = 0, array $headers = [])
    {
        parent::__construct($message, $previous, $code, $headers);
    }
}
