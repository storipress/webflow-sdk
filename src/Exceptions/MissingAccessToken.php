<?php

declare(strict_types=1);

namespace Storipress\Webflow\Exceptions;

use InvalidArgumentException;

class MissingAccessToken extends InvalidArgumentException
{
    /**
     * Create a new exception instance.
     */
    public static function create(): self
    {
        return new self(
            'The Webflow Access Token is missing. Please set the access token.'
        );
    }
}
