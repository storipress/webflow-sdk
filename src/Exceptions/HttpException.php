<?php

declare(strict_types=1);

namespace Storipress\Webflow\Exceptions;

use stdClass;
use Storipress\Webflow\Objects\WebflowError;

abstract class HttpException extends Exception
{
    public WebflowError $error;

    public function __construct(
        string $message = '',
        int $code = 0,
    ) {
        parent::__construct($message, $code);

        $this->toErrorObject();
    }

    public function toErrorObject(): WebflowError
    {
        $data = json_decode($this->message, false);

        if ($data instanceof stdClass) {
            return $this->error = WebflowError::from($data);
        }

        $error = new WebflowError(new stdClass());

        $error->message = $this->message;

        $error->code = (string) $this->code;

        $error->externalReference = null;

        $error->details = [];

        return $this->error = $error;
    }
}
