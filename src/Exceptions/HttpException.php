<?php

declare(strict_types=1);

namespace Storipress\Webflow\Exceptions;

use stdClass;
use Storipress\Webflow\Objects\WebflowError;
use Throwable;

abstract class HttpException extends Exception
{
    public WebflowError $error;

    public function __construct(
        string $message = '',
        int $code = 0,
        Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);

        $error = json_decode($message, false);

        if (!($error instanceof stdClass)) {
            $error = new stdClass();

            $error->message = $message;

            $error->code = (string) $code;

            $error->externalReference = null;

            $error->details = [];
        }

        $this->error = WebflowError::from($error);
    }
}
